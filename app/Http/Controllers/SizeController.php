<?php

namespace App\Http\Controllers;

use App\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.sizes', ['only' => ['index']]);
        $this->middleware('permission:create.sizes', ['only' => ['store']]);
        $this->middleware('permission:edit.sizes', ['only' => ['edit']]);
        // $this->middleware('permission:delete.sizes',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.sizes', ['only' => ['get_deleted_sizes']]);
        $this->middleware('permission:restore.deleted.sizes', ['only' => ['restore_all', 'restore_single']]);
        $this->middleware('permission:delete.forever.sizes', ['only' => ['force_delete_single', 'force_delete_all']]);
    }

    public function index()
    {
        $sizes = Size::all();
        return view('sizes.index', compact('sizes'));
    }

    public function edit(Size $size, Request $request)
    {
        $size = Size::find($size->id);
        $view = view("sizes.edit", compact('size'))->render();

        return response()->json(['html' => $view]);
    }

    public function update(Request $request, $id)
    {
        $size = $request->input('size');
        Size::findOrFail($id)->update([
            'size' => $size,
            'slug' => Str::slug($size),

        ]);
        return redirect('sizes')->with('success', 'Size Updated');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'size' => 'required|unique:sizes'
        ]);
        $size = $request->input('size');
        Size::create([
            'size' => $size,
            'slug' => Str::slug($size),
            // 'category_id'=>$request->input('category'),
        ]);
        return back()->with('success', 'Size has been added');
    }

    public function destroy(Request $request, Size $size)
    {
        $size = Size::whereId($size->id)->with('product_variations')->first();
        if (count($size->product_variations) == 0) {
            $size->delete();
            return back()->with('success', 'Size has been deleted');
        }
        return back()->with('success', 'Size can not be deleted');
    }

    public function bulk_delete(BulkDeleteItemRequest $request)
    {
        $sizes = explode(',', $request->items);
        Size::destroy($sizes);
        return redirect()->route('sizes.index')->with('success', 'sizes have been deleted');
    }

    public function get_deleted_sizes()
    {
        $deleted_sizes = Size::onlyTrashed()->get();
        return view('sizes.deleted', compact('deleted_sizes'));
    }

    public function restore_single($id)
    {
        Size::where('id', $id)->restore();
        return redirect()->route('sizes.deleted')->with('success', 'Size have been restored');
    }

    public function restore_all()
    {
        Size::onlyTrashed()->restore();
        return redirect()->route('sizes.deleted')->with('success', 'Sizes have been restored');
    }

    public function force_delete_single(Request $request, $id)
    {
        Size::where('id', $id)->forceDelete();
        return redirect()->route('sizes.deleted')->with('success', 'Size have been deleted forever!');
    }

    public function force_delete_all(Request $request)
    {
        Size::onlyTrashed()->forceDelete();
        return redirect()->route('sizes.deleted')->with('success', 'Sizes have been deleted forever!');
    }
}
