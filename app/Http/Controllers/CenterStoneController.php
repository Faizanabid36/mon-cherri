<?php

namespace App\Http\Controllers;

use App\CenterStone;
use App\CenterStoneClarity;
use App\CenterStoneColor;
use App\CenterStoneSize;
use Illuminate\Http\Request;

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
            'center_stone_sizes_id' => 'required',
            'center_stone_colors_id' => 'required',
            'center_stone_clarities_id' => 'required',
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
}
