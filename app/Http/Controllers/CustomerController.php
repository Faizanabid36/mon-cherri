<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.customers', ['only' => ['index']]);
    }

    public function index()
    {
        $usersData = Role::where('slug', 'customer')->first()->users()->get();
        $customers = collect($usersData)->map(function ($user) {
            $voucherDecorated = collect($user->vouchers)->map(function ($data) {
                return $data->voucher->promotion_code;
            });
            $data = $user;
            $data->voucherDecorated = $voucherDecorated;
            return $data;
        });
        return view('customers.index', compact('customers'));
    }
    public function edit(User $customer, Request $request)
    {
        $customer=User::whereId($customer->id)->first();
        // dd($customer->info);
        return view('customers.edit',compact('customer'));
    }
    public function store(Request $request)
    {
        User::updateOrCreate(
            ['id'=>$request->customer_id],
            [
                'name'=> $request->first_name." ". $request->last_name,
                'email'=> $request->email,
                'slug'=>Str::slug($request->first_name." ". $request->last_name)
            ]
        );
        UserInfo::updateOrCreate(
            ['user_id'=>$request->customer_id],
            [
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name,
                'phone'=> $request->phone,
                'address'=> $request->address,
                'postal_code'=> $request->postal_code,
            ]
        );
        return redirect()->route('customers.index');
    }
}
