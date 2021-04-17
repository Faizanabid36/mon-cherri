<?php
 
namespace App\Services;

use Auth;
use Cart;
use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;


class OrderService 
{
    public static function order($request,$invoice_number)
    {

        $user = Auth::user();
        $user->info()->update($request->except(['policy_check','customer_note','_token']));
    	
        $payment_method = "AP";
        $sub_total      = str_replace('.00', '', str_replace(',','',Cart::total()));

        $invoice = $user->invoices()->create([
                'invoice_no'        =>  $invoice_number,
                'payment_method'    =>  "COD",
                'sub_total'         =>  $sub_total,
            ]);

        $total_delivery_charges  = 0;

    	foreach (Cart::content() as $product) {

            $delivery_charges = $product->options->delivery_charges*$product->qty;

	       $order =  $invoice->orders()->create([
	    		'product_id'	    =>	$product->id,
	    		'size'			    =>	$product->options->size,
                'quantity'          =>  $product->qty,
                'amount'            =>  $product->total,
                'delivery_charges'  =>  $delivery_charges,
	    	]);

            $total_delivery_charges += $delivery_charges;
    	}


        $grand_total = $total_delivery_charges + $sub_total;
        $customer_note  = $request->input('customer_note');

        $invoice_done = $invoice->update([
                'grand_total'       =>  $grand_total,
                'customer_note'     =>  $customer_note,  
            ]);

        Cart::destroy();
    	return $invoice;
    }

    public static function generate_invoice_no()
    {
        $latest = Invoice::latest()->first();
        if (! $latest) {
            return 'www0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_no);

        $invoice_number  = 'www' . sprintf('%04d', $string+1);

        return $invoice_number;
    }
}