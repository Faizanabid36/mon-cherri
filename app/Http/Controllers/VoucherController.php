<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\VoucherAssigment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('vouchers.index', compact('vouchers'));
    }

    public function create(Request $request)
    {
        return view('vouchers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'promotion_code' => 'required|unique:vouchers',
            'status' => 'required',
            'starting_date' => 'required',
            'description' => 'required',
        ]);
        if ($request->get('type') == 'day')
            $request->merge(['ending_date' => now()->addDays($request->get('days'))->toDateTimeString()]);
        else
            $request->merge(['ending_date' => Carbon::parse($request->get('ending_date'))]);
        $request->merge(['starting_date' => Carbon::parse($request->get('starting_date'))]);
        Voucher::create($request->except('_token', 'ending_type'));
        return redirect()->route('voucher.index')->with('success', 'Voucher Created Successfully');
    }

    public function edit(Request $request, $id)
    {
        $voucher = Voucher::find($id);
        return view('vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'promotion_code' => 'required',
            'status' => 'required',
            'starting_date' => 'required',
            'description' => 'required',
        ]);
        if ($request->get('type') == 'day')
            $request->merge(['ending_date' => now()->addDays($request->get('days'))->toDateTimeString()]);
        else
            $request->merge(['ending_date' => Carbon::parse($request->get('ending_date'))]);
        Voucher::whereId($id)->update($request->except('_token'));
        return redirect()->route('voucher.index')->with('success', 'Voucher Updated Successfully');
    }

    public function delete($id)
    {
        Voucher::destroy($id);
        return redirect()->route('voucher.index')->with('success', 'Voucher Deleted Successfully');
    }

    public function default(Request $request, Voucher $voucher)
    {
        Voucher::whereId($voucher->id)->update(['default' => !$voucher->default]);
        return back()->withSuccess('Status Changed');
    }

    public function customer_voucher_index(Request $request)
    {
        $customers = VoucherAssigment::with('user')->get();
        return view('vouchers.customer_vouchers', compact('customers'));
    }

    public function update_cashed(Request $request, $id)
    {
        $item = VoucherAssigment::whereId($id)->firstOrFail();
        VoucherAssigment::whereId($id)->update(['cashed' => !$item->cashed]);
        return back()->with('success', 'Operation Successful');
    }
}
