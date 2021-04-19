<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;
class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.currencies',['only' => ['index']]);
        $this->middleware('permission:create.currencies',['only' => ['create','store']]);
        $this->middleware('permission:edit.currencies',['only' => ['edit']]);
        $this->middleware('permission:delete.currencies',['only' => ['destroy']]);
    }
    public function index()
    {
        $currencies = currency()->getCurrencies();
        return view('currency.index',compact('currencies'));
    }
    public function create()
    {
        return view("currency.create");
    }
    public function edit($code, Request $request)
    {
        $currency = currency()->find($code);
        return view("currency.edit",compact('currency'));
    }

    public function store(Request $request)
    {
        currency()->create($request->only('name','code','symbol','format','exchange_rate'));
        return redirect()->route('currencies.index')->with('success','Currency has been added');
    }

    public function update(Request $request, $code)
    {
        currency()->update($code, $request->only('name','code','symbol','format','exchange_rate','active'));
        return redirect('currencies')->with('success','Currency has been Updated');
    }
    public function destroy(Request $request, $code)
    {
        currency()->delete($code);
        return redirect('currencies')->with('success','Currency has been deleted');
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $currencies = explode(',',$request->items);
        foreach ($currencies as $code) {
           currency()->delete($code);
        }
        return redirect()->route('currencies.index')->with('success','Currencies have been deleted');
    }
}
