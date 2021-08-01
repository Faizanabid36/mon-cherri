<?php

namespace App\Http\Controllers;

use App\CenterStone;
use App\CenterStoneClarity;
use App\CenterStoneColor;
use App\CenterStoneSize;
use App\Color;
use Illuminate\Http\Request;
use App\Imports\CenterStonesImport;
use Excel;

class CenterStoneController extends Controller
{
    public function index()
    {
        $center_stones = CenterStone::all();
        return view('center_stones.index', compact('center_stones'));
    }

    public function create()
    {
        return view('center_stones.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'diamond_id' => 'required',
            'shape' => 'required',
            'description' => 'required',
            'center_stone_sizes' => 'required',
            'center_stone_colors' => 'required',
            'center_stone_clarities' => 'required',
            'polish' => 'required',
            'fluor' => 'required',
            'symm' => 'required',
            'lab' => 'required',
            'certificate_no' => 'required',
            'vendor_stock_no' => 'required',
            'price_cc' => 'required',
            'total_price' => 'required',
            'seller' => 'required',
            'ham_page' => 'required',
        ]);
        $stone = CenterStone::create($request->except('_token'));

        return redirect()->route('center_stone.index')->withSuccess('Stone Created Successfully');
    }

    public function sizes_index()
    {
        $center_stone_sizes = CenterStoneSize::orderBy('priority')->get();
        return view('center_stone_sizes.index', compact('center_stone_sizes'));
    }

    public function store_size(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'priority' => 'required|unique:center_stone_sizes'
        ]);
        CenterStoneSize::create($request->only(['title', 'priority']));
        return back()->with('success', 'Stone Size Created');
    }

    public function clarities_index()
    {
        $center_stone_clarities = CenterStoneClarity::orderBy('priority')->get();
        return view('center_stone_clarity.index', compact('center_stone_clarities'));
    }

    public function store_clarity(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'priority' => 'required|unique:center_stone_clarities'
        ]);
        CenterStoneClarity::create($request->only(['title', 'priority']));
        return back()->with('success', 'Stone Size Created');
    }

    public function edit_clarity($id)
    {
        $clarity = CenterStoneClarity::find($id);
        $view = view("center_stone_clarity.edit", compact('clarity'))->render();
        return response()->json(['html' => $view]);
    }

    public function delete_clarity($id)
    {
        $clarity = CenterStoneClarity::find($id);
        $stone=CenterStone::where('center_stone_clarities',$clarity->title)->first();
        if(!$stone)
        {
            $clarity->delete();
            return back()->with('success', 'Clarity deleted');
        }
        return back()->with('success', 'Clarity can not be deleted');
        
    }
    public function update_clarity(Request $request, $id)
    {
        CenterStoneClarity::whereId($id)->update([
            'title' => $request->get('title'),
            'priority' => $request->get('priority')
        ]);
        return redirect()->route('center_stone.clarities.index')->withSuccess('Updated Successfully');
    }

    public function colors_index()
    {
        $center_stone_colors = CenterStoneColor::orderBy('priority')->get();
        return view('center_stone_color.index', compact('center_stone_colors'));
    }

    public function store_color(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'priority' => 'required|unique:center_stone_colors'
        ]);
        CenterStoneColor::create($request->only(['title', 'priority']));
        return back()->with('success', 'Stone Size Created');
    }

    public function edit_color($id)
    {
        $color = CenterStoneColor::find($id);
        $view = view("center_stone_color.edit", compact('color'))->render();
        return response()->json(['html' => $view]);
    }

    public function delete_color($id)
    {
        $color = CenterStoneColor::whereId($id)->first();
        $stone=CenterStone::where('center_stone_colors',$color->title)->first();
        
        if(!$stone)
        {
            $color->delete();
            return back()->with('success', 'Color has been deleted');
        }
        return back()->with('success', 'Color can not be deleted');
    }
    public function update_color(Request $request, $id)
    {
        CenterStoneColor::whereId($id)->update([
            'title' => $request->get('title'),
            'priority' => $request->get('priority')
        ]);
        return redirect()->route('center_stone.colors.index')->withSuccess('Updated Successfully');
    }

    public function import_csv(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx,csv'
        ]);
//        $path = $request->file('file')->getRealPath();

        $file = $request->file('file');
        $path = 'images/sheet';
        // image upload
        $extension = $file->extension();
        $image = time() . '.' . $extension;
        $file->move(public_path($path), $image);
        // Session::put('center_stones_id', $request->id);
        $url = $path . '/' . $image;
        Excel::import(new CenterStonesImport, $url);
        return back()->with('success', 'Center Stones has been updated');
    }
}
