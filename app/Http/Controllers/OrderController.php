<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Order;
use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\OrderUpdateRequest;
use App\Notifications\InvoicePaid;


class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view.orders',['only' => ['index']]);
        $this->middleware('permission:edit.orders',['only' => ['edit']]);
        $this->middleware('permission:send.ordersinvoice',['only' => ['sendInvoice']]);
        $this->middleware('permission:delete.orders',['only' => ['destroy']]);
    }
    public function index()
    {
        $invoices = Invoice::latest()->get();
        return view('orders.index',compact('invoices'));
    }

    public function show($invoice)
    {
        $invoice = Invoice::findOrFail($invoice);
        {{dd('asd');}}
        return view('orders.show',compact('invoice'));
    }

    public function edit($invoice)
    {
        $invoice = Invoice::findOrFail($invoice);
        return view('orders.edit',compact('invoice'));
    }
    public function update(OrderUpdateRequest $request, $invoice)
    {
        // dd($request->all());
        $invoice = Invoice::findOrFail($invoice);
        $invoice->update($request->only('payment_method','status','sub_total','grand_total'));
        foreach ($invoice->orders as $key => $order) {
            $order->size                = $request->size[$key];
            $order->quantity            = $request->quantity[$key];
            $order->amount              = $request->amount[$key];
            $order->delivery_charges    = $request->delivery_charges[$key];
            $order->save();
        }

        if($invoice->status == 1){
            $invoice->update(['due_date'=>Carbon::today()]);
        }else{
            $invoice->update(['due_date'=>null]);
        }

        $invoice->save();
        return redirect()->route('orders.show',$invoice->id)->with('success','Order has been updated');
    }

    public function destroy(Order $order)
    {
        Order::find($order->id)->delete();
        return redirect('orders')->with('success','Order has been deleted');
    }


    public function sendInvoice($invoice)
    {
        $invoice = Invoice::findOrFail($invoice);
        $invoice->user->notify(new InvoicePaid($invoice));
        return redirect()->route('orders.show',$invoice->id)->with('success', 'Invoice has been sent!');
    }
}
