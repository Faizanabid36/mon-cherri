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
