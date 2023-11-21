<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:analysis');
    }

    public function index()
    {

        $totalEarningAllPrices = Order::
        with('orderItems.productOrderItems.product.price')->get();

        $totalPrices = $totalEarningAllPrices->pluck('orderItems.*.productOrderItems.*.product.price')->flatten()->sum('meta_value');

        $totalSellerDeservedPrices = $totalEarningAllPrices->pluck('orderItems.*.productOrderItems.*.product.sellerDeserved')->flatten()->sum('meta_value');

        $totalEarning = $totalPrices - $totalSellerDeservedPrices;

        return view('analysis', compact('totalEarning', 'totalSellerDeservedPrices', 'totalPrices'));
    }

    public function profitReport(Request $request)
    {

        $totalSales = Order::when(request()->from_date, function ($q) {
            $q->whereDate('post_date','>=',request()->from_date);
        })->when(request()->to_date, function ($q) {
            $q->whereDate('post_date','<=',request()->to_date);
        })->get()->pluck('orderStatus')->sum('total_sales');

        $totalSalesCompleted = Order::when(request()->from_date, function ($q, $v) {
            $q->whereDate('post_date','>=',request()->from_date);
        })->when(request()->to_date, function ($q, $v) {
            $q->whereDate('post_date','<=',request()->to_date);
        })->whereHas('orderStatus', function ($q) {
            $q->where('status', 'wc-completed');
        })->get()->pluck('orderStatus')->sum('total_sales');

        $totalSellerDeservedCompletedPrices = Order::when(request()->from_date, function ($q, $v) {
            $q->whereDate('post_date','>=',request()->from_date);
        })->when(request()->to_date, function ($q, $v) {
            $q->whereDate('post_date','<=',request()->to_date);
        })->whereHas('orderStatus', function ($q) {
            $q->where('status', 'wc-completed');
        })->with('orderItems.productOrderItems.product.price')->get()
            ->pluck('orderItems.*.productOrderItems.*.product.sellerDeserved')
            ->flatten()->sum('meta_value');

        $totalShippingCompanyCompleted = Order::when(request()->from_date, function ($q, $v) {
            $q->whereDate('post_date','>=',request()->from_date);
        })->when(request()->to_date, function ($q, $v) {
            $q->whereDate('post_date','<=',request()->to_date);
        })->whereHas('orderStatus', function ($q) {
            $q->where('status', 'wc-completed');
        })->get()->sum('shipping_company_cost_price');

        $totalShippingCompanyRefund = Order::when(request()->from_date, function ($q, $v) {
            $q->whereDate('post_date','>=',request()->from_date);
        })->when(request()->to_date, function ($q, $v) {
            $q->whereDate('post_date','<=',request()->to_date);
        })->whereHas('orderStatus', function ($q) {
            $q->where('status', 'wc-refunded');
        })->get()->sum('shipping_company_cost_refund_price');

        $netProfit = $totalSalesCompleted - $totalSellerDeservedCompletedPrices - $totalShippingCompanyCompleted
        -$totalShippingCompanyRefund;

        $totalOrders = Order::when(request()->from_date, function ($q, $v) {
            $q->whereDate('post_date','>=',request()->from_date);
        })->when(request()->to_date, function ($q, $v) {
            $q->whereDate('post_date','<=',request()->to_date);
        })->count();

        $orders = Order::when(request()->from_date, function ($q, $v) {
            $q->whereDate('post_date','>=',request()->from_date);
        })->when(request()->to_date, function ($q, $v) {
            $q->whereDate('post_date','<=',request()->to_date);
        })->whereHas('orderStatus', function ($q) {
            $q->where('status', 'wc-completed')
                ->orWhere('status', 'wc-refunded');
        })->with('orderItems', 'orderItems.productOrderItems',
            'orderItems.productOrderItems.product.price')->paginate(50);

        return view('order-profit', compact('orders', 'totalSales', 'totalOrders'
            ,'netProfit','totalSellerDeservedCompletedPrices','totalSalesCompleted','totalShippingCompanyRefund'
        ,'totalShippingCompanyCompleted'));
    }
}



//        $ordersTotal = Order::whereHas('orderStatus', function ($q) {
//            $q->where('status', 'wc-completed')->orWhere('status', 'wc-refunded');
//        })->with('orderItems', 'orderItems.productOrderItems',
//            'orderItems.productOrderItems.product.price')->get();
//
//        $companyCostTotal = 0;
//        $sellerDeservedTotal = 0;
//        $systemProfitTotal = 0;
//
//        foreach ($ordersTotal as $key => $order) {
//            $companyCost = 0;
//            $sellerDeserved = 0;
//            $orderState = null;
//
//            if ($order->postMetaShippingStateId) {
//                $companyCostState = \App\Models\CompanyCostState::where('state_id',
//                    $order->postMetaShippingStateId->meta_value)->first();
//                $companyCost = $companyCostState->shippingCompanyCost->price ?? 0;
//            } else if ($order->postMetaShippingState) {
//                $orderState = $order->postMetaShippingState->meta_value;
//            } else if ($order->postMetaShippingCity) {
//                $orderState = $order->postMetaShippingCity->meta_value;
//            }
//
//            if (isset($orderState)) {
//                $companyCostState = \App\Models\CompanyCostState::
//                whereHas('state', function ($q) use ($orderState) {
//                    $q->where('name', $orderState);
//                })->first();
//
//                $companyCost = $companyCostState->shippingCompanyCost->price;
//            }
//
//            foreach ($order->orderItems as $orderItem) {
//                foreach ($orderItem->productOrderItems as $productOrderItems) {
//                    $sellerDeserved = $productOrderItems->product->sellerDeserved->meta_value ?? 0;
//                }
//            }
//
//            $systemProfit = $order->postMetaTotalPrice->meta_value - $companyCost - $sellerDeserved;
//
//            if ($order->orderStatus->status == 'wc-refunded') {
//                $companyCostTotal -= $companyCost;
//            } else {
//                $companyCostTotal += $companyCost;
//                $sellerDeservedTotal += $sellerDeserved;
//                $systemProfitTotal += $systemProfit;
//            }
//
//        }
