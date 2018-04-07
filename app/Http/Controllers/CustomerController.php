<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show($customer_id){

        return view('customer.show',['customer'=> Customer::findOrFail($customer_id)]);
    }

    public function create(){

        return view('customer.create');
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        return redirect('customer/show/'. $customer->customer_id);
    }
}
