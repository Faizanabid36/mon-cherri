<?php

namespace App\Http\Controllers;

use App\Width;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class WidthController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.widths',['only' => ['index']]);
        $this->middleware('permission:create.widths',['only' => ['store']]);
        $this->middleware('permission:edit.widths',['only' => ['edit']]);
        // $this->middleware('permission:delete.widths',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.widths',['only' => ['get_deleted_widths']]);
        $this->middleware('permission:restore.deleted.widths',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.widths',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $widths = Width::all();
        return view('widths.index',compact('widths'));
    }

   public function edit(Width $width, Request $request)
    {
        $width = Width::find($width->id);
        $view = view("widths.edit",compact('width'))->render();

        return response()->json(['html'=>$view]);
    }
    public function store(Request $request)
    {
        $width = $request->input('width');
        Width::create([
            'width'=> $width
        ]);
        return back()->with('success','Width has been added');
    }

    public function update(Request $request, $width_id)
    {
        $width = Width::find($width_id);
        $width->width = $request->input('width');
        $width->save();
        return redirect('widths')->with('success','Width has been Updated');
    }
    public function destroy(Request $request, $width)
    {
        $width=Width::whereId($width)->with('product_variations')->first();
        if(count($width->product_variations)==0)
        {
            $width->delete();
            return back()->with('success','Width has been deleted');
        }
        return back()->with('success','Width can not be deleted');
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $widths = explode(',',$request->items);
        Width::destroy($widths);
        return redirect()->route('widths.index')->with('success','Widths have been deleted');
    }

    public function get_deleted_widths()
    {
        $deleted_widths = Width::onlyTrashed()->get();
        return view('widths.deleted',compact('deleted_widths'));
    }
    public function restore_single($id)
    {
        Width::where('id',$id)->restore();
        return redirect()->route('widths.deleted')->with('success','Width have been restored');
    }
    public function restore_all()
    {
        Width::onlyTrashed()->restore();
        return redirect()->route('widths.deleted')->with('success','Widths have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Width::where('id',$id)->forceDelete();
        return redirect()->route('widths.deleted')->with('success','Width have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Width::onlyTrashed()->forceDelete();
        return redirect()->route('widths.deleted')->with('success','Widths have been deleted forever!');
    }
}
