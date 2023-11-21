<?php


namespace App\Http\Controllers;


use App\Models\Meta;
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\StockHistory;
use Illuminate\Http\Request;
use DB;


class ProductsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list', ['only' => ['index']]);
        $this->middleware('permission:update-stock', ['only' => ['stock','stockUpdate']]);
        $this->middleware('permission:update-price', ['only' => ['price','priceUpdate']]);
        $this->middleware('permission:report', ['only' => ['report']]);
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    public function report()
    {
        $products = Product::orderBy('id', 'desc')->paginate(15);

        return view('admin.products.report', compact('products'));
    }

    public function stock($id)
    {
        $product = Product::findOrFail($id);

        $stockHistories = StockHistory::with('product')
            ->where('main_product_id',$id)
            ->get();

        return view('admin.products.stock', compact('product','stockHistories'));
    }

    public function price($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.price', compact('product'));
    }

    public function stockUpdate(Request $request)
    {
        foreach ($request->product_meta_id as $key => $product_meta_id) {
            $productMeta = ProductMeta::where('product_id', $product_meta_id)->first();
            if ($request->quantity[$key] != 0) {
                $productMeta->update([
                    'stock_quantity' => $productMeta->stock_quantity + $request->quantity[$key],
                ]);

                StockHistory::create([
                    'main_product_id' => $request->main_product_id,
                    'product_id'      => $product_meta_id,
                    'quantity'        => $request->quantity[$key],
                ]);
            }
        }

        return redirect()->back()->with([
            'success' => __('messages.updated successfully')
        ]);
    }

    public function priceUpdate(Request $request)
    {
        foreach ($request->price_meta_id as $key => $price_meta_id) {
            $meta = Meta::where('meta_id', $price_meta_id)->first();
            $meta->update([
                'meta_value' => $request->price[$key],
            ]);

            Meta::where('meta_id', $request->seller_deserved_meta_id[$key])
                ->updateOrCreate([
                    'post_id' => $request->post_id[$key],
                    'meta_key' => '_seller_deserved',
                ],[
                    'post_id' => $request->post_id[$key],
                    'meta_key' => '_seller_deserved',
                    'meta_value' => $request->seller_deserved[$key],
                ]);
        }


        return redirect()->back()->with([
            'success' => __('messages.updated successfully')
        ]);
    }

}
