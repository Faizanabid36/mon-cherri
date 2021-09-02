<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.categories',['only' => ['index']]);
        $this->middleware('permission:create.categories',['only' => ['store']]);
        $this->middleware('permission:edit.categories',['only' => ['edit']]);
        $this->middleware('permission:delete.categories',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.categories',['only' => ['get_deleted_categories']]);
        $this->middleware('permission:restore.deleted.categories',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.categories',['only' => ['force_delete_single','force_delete_all']]);
    }

    public function index()
    {    
        $categories = Category::orderBy('prority')->get();
        return view('categories.index',compact('categories'));
    }


    public function edit(Category $category, Request $request)
    {
        $category = Category::find($category->id);
        $view = view("categories.edit",compact('category'))->render();
        
        return response()->json(['html'=>$view]);
    }

    public function update(Request $request, Category $category)
    {
        $title           = Str::lower($request->input('title'));
        $slug            = Str::slug($title);
        $pr = $request->input('prority');
        if($request->file('path')){
        $image = $request->file('path');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/category/');
        $image->move($destinationPath, $name);
        $path=asset('images/category/'.$name);
        $category        = Category::where('id',$category->id)->update(['title'=>$title,'slug'=>$slug,'image'=>$path,'prority'=>$pr]);
        }
        else{
        $category        = Category::where('id',$category->id)->update(['title'=>$title,'slug'=>$slug,'prority'=>$pr]);
        }
        return redirect('categories')->with('success','Category Updated');
    }

    public function store(Request $request)
    {  
        
        $title = Str::lower($request->input('category'));
        
        $pr = $request->input('prority');
        $slug  = Str::slug($title);
        $image = $request->file('path');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/category/');
        $image->move($destinationPath, $name);
        $path=asset('images/category/'.$name);
    
        
        Category::create(['title'=>$title,'slug'=>$slug,'image'=>$path,'prority'=>2]);
        return back()->with('success','Category has been added');
    }

    public function destroy(Request $request,Category $category)
    {
        $category=Category::whereId($category->id)->with('subcategories')->first();
        
        if(count($category->subcategories)==0)
        {
            $category->delete();
            return back()->with('success','Category has been deleted');
        }
        return back()->with('success','Category can not be deleted');
       
    }
     public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $categories = explode(',',$request->items);
        Category::destroy($categories);
        return redirect()->route('categories.index')->with('success','Categories have been deleted');
    }

    public function get_deleted_categories()
    {
        $deleted_categories = Category::onlyTrashed()->get();
        return view('categories.deleted',compact('deleted_categories'));
    }
    public function restore_single($id)
    {
        Category::where('id',$id)->restore();
        return redirect()->route('categories.deleted')->with('success','Category have been restored');
    }
    public function restore_all()
    {
        Category::onlyTrashed()->restore();
        return redirect()->route('categories.deleted')->with('success','Categories have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Category::where('id',$id)->forceDelete();
        return redirect()->route('categories.deleted')->with('success','Category have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Category::onlyTrashed()->forceDelete();
        return redirect()->route('categories.deleted')->with('success','Categories have been deleted forever!');
    }
}
