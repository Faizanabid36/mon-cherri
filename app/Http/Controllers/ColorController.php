<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;


class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.colors',['only' => ['index']]);
        $this->middleware('permission:create.colors',['only' => ['store']]);
        $this->middleware('permission:edit.colors',['only' => ['edit']]);
        // $this->middleware('permission:delete.colors',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.colors',['only' => ['get_deleted_colors']]);
        $this->middleware('permission:restore.deleted.colors',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.colors',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $colors = Color::all();
        return view('colors.index',compact('colors'));
    }

   public function edit(Color $color, Request $request)
    {
        $color = Color::find($color->id);
        $view = view("colors.edit",compact('color'))->render();

        return response()->json(['html'=>$view]);
    }
    public function store(Request $request)
    {
        $color = Str::lower($request->input('color'));
        Color::create([
            'color'=> $color,
            'code' => $request->input('code'),
            'slug'=>  Str::slug($color),
        ]);
        return back()->with('success','Color has been added');
    }

    public function update(Request $request, $color_id)
    {
        $clr           = Str::lower($request->input('color'));
        $slug          = Str::slug($clr);
        $color = Color::find($color_id);
        $color->color = $clr;
        $color->slug  =  $slug;
        $color->code  = $request->input('code');
        $color->save();
        return redirect('colors')->with('success','Color has been Updated');
    }
    public function destroy(Request $request, $color)
    {
        $color=Color::whereId($color)->with(['products','variations'])->first();
        if(count($color->variations)==0)
        {
            $color->delete();
            return back()->with('success','Color has been deleted');
        }
        return back()->with('success','Color can not be deleted');
        
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $colors = explode(',',$request->items);
        Color::destroy($colors);
        return redirect()->route('colors.index')->with('success','Colors have been deleted');
    }

    public function get_deleted_colors()
    {
        $deleted_colors = Color::onlyTrashed()->get();
        return view('colors.deleted',compact('deleted_colors'));
    }
    public function restore_single($id)
    {
        Color::where('id',$id)->restore();
        return redirect()->route('colors.deleted')->with('success','Color have been restored');
    }
    public function restore_all()
    {
        Color::onlyTrashed()->restore();
        return redirect()->route('colors.deleted')->with('success','Colors have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Color::where('id',$id)->forceDelete();
        return redirect()->route('colors.deleted')->with('success','Color have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Color::onlyTrashed()->forceDelete();
        return redirect()->route('colors.deleted')->with('success','Colors have been deleted forever!');
    }
}
