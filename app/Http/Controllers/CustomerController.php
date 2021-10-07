<?php

namespace App\Http\Controllers;

use App\Role;

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
}
