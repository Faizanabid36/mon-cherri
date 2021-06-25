<?php

namespace App\Http\Controllers;

use App\Variation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class VariationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.variations',['only' => ['index']]);
        $this->middleware('permission:create.variations',['only' => ['store']]);
        $this->middleware('permission:edit.variations',['only' => ['edit']]);
        $this->middleware('permission:delete.variations',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.variations',['only' => ['get_deleted_variations']]);
        $this->middleware('permission:restore.deleted.variations',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.variations',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $variations = Variation::all();
        return view('variations.index',compact('variations'));
    }

   public function edit(Variation $variation, Request $request)
    {
        $variation = Variation::find($variation->id);
        $view = view("variations.edit",compact('variation'))->render();

        return response()->json(['html'=>$view]);
    }
    public function store(Request $request)
    {
        Variation::create([
            'title'=> $request->title,
            'sub_title' => $request->sub_title,
            'color'=>$request->color,
            'slug'=>  Str::slug($request->title),
        ]);
        return back()->with('success','Variation has been added');
    }

    public function update(Request $request)
    {
        Variation::updateOrCreate(
            [
                'id'=>$request->id
            ],
            [
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'slug'=>  Str::slug($request->title),
            ]
        );
        return redirect('variations')->with('success','Variation has been Updated');
    }
    public function destroy(Request $request, $variation)
    {
        Variation::find($variation)->delete();
        return back()->with('success','Variation has been deleted');
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $variations = explode(',',$request->items);
        Variation::destroy($variations);
        return redirect()->route('variations.index')->with('success','Variations have been deleted');
    }

    public function get_deleted_Variations()
    {
        $deleted_variations = Variation::onlyTrashed()->get();
        return view('variations.deleted',compact('deleted_variations'));
    }
    public function restore_single($id)
    {
        Variation::where('id',$id)->restore();
        return redirect()->route('variations.deleted')->with('success','Variation have been restored');
    }
    public function restore_all()
    {
        Variation::onlyTrashed()->restore();
        return redirect()->route('variations.deleted')->with('success','Variations have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Variation::where('id',$id)->forceDelete();
        return redirect()->route('variations.deleted')->with('success','Variation have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Variation::onlyTrashed()->forceDelete();
        return redirect()->route('variations.deleted')->with('success','Variations have been deleted forever!');
    }
}
