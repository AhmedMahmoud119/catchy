<?php


namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PostMeta;
use App\Models\StatusHistory;
use Illuminate\Http\Request;
use DB;


class OrdersController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:order-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:order-edit', ['only' => ['updateStatus']]);
    }

    public function index($type = null)
    {
        $orders = Order::when($type, function ($q, $v) use ($type) {
            $q->whereHas('orderStatus', function ($q) use ($type) {
                $q->where('status', $type);
            });
        })->when(request()->source, function ($q, $v) use ($type) {
            if (request()->source == 'Wordpress') {
                $q->whereHas('postMetaSource', function ($q) use ($type) {
                    $q->where('meta_value', request()->source);
                })->orDoesntHave('postMetaSource');
            }else{
                $q->whereHas('postMetaSource', function ($q) use ($type) {
                    $q->where('meta_value', request()->source);
                });
            }
        })->when(request()->from_date, function ($q, $v) use ($type) {
            $q->whereDate('post_date','>=',request()->from_date);
        })->when(request()->to_date, function ($q, $v) use ($type) {
            $q->whereDate('post_date','<=',request()->to_date);
        })->orderBy('id', 'desc')->paginate(50);

        return view('admin.orders.index', compact('orders'));

    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus($id, Request $request)
    {

        if ($request->status == 'wc-in-shipping') {

            $order = Order::where('ID',$id)->update([
                'shipping_company_id' => $request->shipping_company_id
            ]);

            $order = Order::where('ID',$id)->first();

            if ($order->postMetaShippingStateId) {
                PostMeta::where([
                    'post_id' => $id,
                    'meta_key' => '_shipping_state_id',
                ])->update([
                    'meta_value'  => $request->state_id,
                ]);
            }else{
                PostMeta::create([
                    'post_id' => $id,
                    'meta_key' => '_shipping_state_id',
                    'meta_value'  => $request->state_id,
                ]);
            }

        }

        OrderStatus::where('order_id', $id)->update([
            'status' => $request->status,
        ]);

        Order::where('ID', $id)->update([
            'post_status' => $request->status,
        ]);

        StatusHistory::create([
            'order_id' => $id,
            'status'   => $request->status,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => __('messages.updated successfully'),
            ], 200);
        }

        return redirect()->back()->with([
            'success' => __('messages.updated successfully'),
        ]);


    }

    public function updatePaymentStatus($id, Request $request)
    {
        if ($request->payment_status) {
            OrderStatus::where('order_id', $id)->update([
                'date_paid' => now(),
            ]);
        }else{
            OrderStatus::where('order_id', $id)->update([
                'date_paid' => null,
            ]);
        }


        if ($request->ajax()) {
            return response()->json([
                'success' => __('messages.updated successfully'),
            ], 200);
        }

        return redirect()->back()->with([
            'success' => __('messages.updated successfully'),
        ]);


    }

    public function updateSource($id, Request $request)
    {
        $order = Order::where('ID',$id)->first();

        if ($order->postMetaSource) {
            PostMeta::where([
                'post_id' => $id,
                'meta_key' => '_source',
            ])->update([
                'meta_value'  => $request->source,
            ]);
        }else{
            PostMeta::create([
                'post_id' => $id,
                'meta_key' => '_source',
                'meta_value'  => $request->source,
            ]);
        }


        if ($request->ajax()) {
            return response()->json([
                'success' => __('messages.updated successfully'),
            ], 200);
        }

        return redirect()->back()->with([
            'success' => __('messages.updated successfully'),
        ]);

    }

    public function printOrder(Request $request){
        if (is_array($request->order_ids)) {
            $ids = $request->order_ids;
        }else{
            $ids = [$request->order_ids];
        }

        $orders = Order::whereIn('ID',$ids)->get();

        return view('admin.orders.print',compact('orders'))->render();
    }

}
