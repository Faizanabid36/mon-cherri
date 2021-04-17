<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\BulkDeleteItemRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.products',['only' => ['index']]);
        $this->middleware('permission:create.products',['only' => ['create']]);
        $this->middleware('permission:edit.products',['only' => ['edit']]);
        $this->middleware('permission:delete.products',['only' => ['destroy','bulk_delete']]);
        $this->middleware('permission:view.deleted.products',['only' => ['get_deleted_products']]);
        $this->middleware('permission:restore.deleted.products',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.products',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index',compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {
        ProductService::upload_product($request);
        return redirect()->route('products.create')->with('success','Product has been uploaded successfuly');
    }
    public function show(Product $product)
    {
        return redirect('/'.$product->slug);
    }
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        return view('products.edit',compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        ProductService::update_product($request,$product);
        return redirect()->route('products.index')->with('success','Product has been updated');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success','Product has been deleted');
    }

    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $products = explode(',',$request->items);
        Product::destroy($products);
        return redirect()->route('products.index')->with('success','Products have been deleted');
    }
    public function get_deleted_products()
    {
        $deleted_products = Product::onlyTrashed()->get();
        return view('products.deleted',compact('deleted_products'));
    }
    public function restore_single($id)
    {
        Product::where('id',$id)->restore();
        return redirect()->route('products.deleted')->with('success','Product have been restored');
    }
    public function restore_all()
    {
        Product::onlyTrashed()->restore();
        return redirect()->route('products.deleted')->with('success','Products have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Product::where('id',$id)->forceDelete();
        return redirect()->route('products.deleted')->with('success','Product have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Product::onlyTrashed()->forceDelete();
        return redirect()->route('products.deleted')->with('success','Products have been deleted forever!');
    }
    public function get_more_product_details(Request $request)
    {
        $category = Category::find($request->input('id'));
        $view = view("partials.product_create_more_detail",compact('category'))->render();
        return response()->json(['html'=>$view]);
    }
}
