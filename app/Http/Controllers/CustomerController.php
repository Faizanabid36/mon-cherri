<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
	 public function __construct()
    {
        $this->middleware('permission:view.customers',['only' => ['index']]);
    }
    public function index()
    {
    	$customers = Role::where('slug', 'customer')->first()->users()->get();
    	return view('customers.index',compact('customers'));
    }
}
