<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.brands',['only' => ['index']]);
        $this->middleware('permission:create.brands',['only' => ['store']]);
        $this->middleware('permission:edit.brands',['only' => ['edit']]);
        // $this->middleware('permission:delete.brands',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.brands',['only' => ['get_deleted_brands']]);
        $this->middleware('permission:restore.deleted.brands',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.brands',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $brands = Brand::with('Category')->latest()->get();
        return view('brands.index',compact('brands'));
    }

    public function edit(Brand $brand, Request $request)
    {
        $brand = Brand::find($brand->id);
        $view = view("brands.edit",compact('brand'))->render();

        return response()->json(['html'=>$view]);
    }

    public function update(Request $request, Brand $brand)
    {
        $title           = Str::lower($request->input('title'));
        $category_id     = $request->input('category');
        $slug            = Str::slug($title);

        $brand        = Brand::where('id',$brand->id)->update(['title'=>$title,'slug'=>$slug,'category_id'=>$category_id]);
        return redirect('brands')->with('success','Brand Updated');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand'=>'required|unique:brands,title'
        ]);
        if (!$validated) {
           return back()->withInput();
        }
        $brand_name = Str::lower($request->input('brand'));
        Brand::create([
            'title'=> $brand_name,
            'slug' => Str::slug($brand_name),
            'category_id'=> $request->input('category'),
        ]);
        return back()->with('success','Brand has been added');
    }
    public function destroy(Request $request,Brand $brand)
    {
        Brand::find($brand->id)->delete();
        return back()->with('success','Brand has been deleted');
    }

    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $brands = explode(',',$request->items);
        Brand::destroy($brands);
        return redirect()->route('brands.index')->with('success','Brands have been deleted');
    }

    public function get_deleted_brands()
    {
        $deleted_brands = Brand::onlyTrashed()->get();
        return view('brands.deleted',compact('deleted_brands'));
    }
    public function restore_single($id)
    {
        Brand::where('id',$id)->restore();
        return redirect()->route('brands.deleted')->with('success','Brand have been restored');
    }
    public function restore_all()
    {
        Brand::onlyTrashed()->restore();
        return redirect()->route('brands.deleted')->with('success','Brands have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Brand::where('id',$id)->forceDelete();
        return redirect()->route('brands.deleted')->with('success','Brand have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Brand::onlyTrashed()->forceDelete();
        return redirect()->route('brands.deleted')->with('success','Brands have been deleted forever!');
    }
}