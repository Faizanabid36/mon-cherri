<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class SubCategoryController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('permission:view.subcategories',['only' => ['index']]);
        $this->middleware('permission:create.subcategories',['only' => ['store']]);
        $this->middleware('permission:edit.subcategories',['only' => ['edit']]);
        $this->middleware('permission:delete.subcategories',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.subcategories',['only' => ['get_deleted_subcategories']]);
        $this->middleware('permission:restore.deleted.subcategories',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.subcategories',['only' => ['force_delete_single','force_delete_all']]);
    }

    public function index()
    {
        $sbcategories = SubCategory::all();
        return view('subcategories.index',compact('sbcategories'));
    }


    public function store(Request $request)
    {
        $category = Category::find($request->input('parent_category_id'));
        $subcategory  =  $request->input('subcategory');
        $category->subcategories()->create([
            'title'=>$request->input('subcategory'),
            'slug'=>Str::slug($request->input('subcategory').'-'.$category->slug),
        ]);
        return redirect()->route('subcategories.index')->with('success','Sub Category has been added');
    }

    public function edit($subCategory,  Request $request)
    {
        $sbcategory = SubCategory::find($subCategory);
        $view = view("subcategories.edit",compact('sbcategory'))->render();

        return response()->json(['html'=>$view]);
    }

    public function update(Request $request, $subCategory)
    {
        $subcategory     = SubCategory::find($subCategory);
        $title           = $request->input('subcategory');
        $slug            = Str::slug($title.'-'.$subcategory->category->slug);
        $subcategory->title = $title;
        $subcategory->slug  =  $slug;
        $subcategory->category_id = $request->input('parent_category_id');
        $subcategory->save();
        return redirect()->route('subcategories.index')->with('success','Sub Category Updated');
    }
    public function destroy($subCategory)
    {
        $sbcategory = SubCategory::whereId($subCategory)->with('products')->first();
        if(count($sbcategory->products)==0)
        {
            $sbcategory->delete();
            return back()->with('success','Sub Category has been deleted');
        }
        return back()->with('success','Sub Category can not be deleted');
    }

     public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $subcategories = explode(',',$request->items);
        SubCategory::destroy($subcategories);
        return redirect()->route('categories.index')->with('success','Categories have been deleted');
    }

    public function get_deleted_subcategories()
    {
        $deleted_subcategories = SubCategory::onlyTrashed()->get();
        return view('subcategories.deleted',compact('deleted_subcategories'));
    }
    public function restore_single($id)
    {
        SubCategory::where('id',$id)->restore();
        return redirect()->route('subcategories.deleted')->with('success','SubCategory have been restored');
    }
    public function restore_all()
    {
        SubCategory::onlyTrashed()->restore();
        return redirect()->route('subcategories.deleted')->with('success','SubCategories have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        SubCategory::where('id',$id)->forceDelete();
        return redirect()->route('subcategories.deleted')->with('success','SubCategory have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        SubCategory::onlyTrashed()->forceDelete();
        return redirect()->route('subcategories.deleted')->with('success','SubCategories have been deleted forever!');
    }
}
