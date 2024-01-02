<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('customer',compact('customers'))->with ('i',request()->input('page',1)-1*5+4);
    }
    public function create()
    {
        $customer = Customer::paginate(5);
        return view('customer-create');
    }
    public function edit()
    {
        $customer = Customer::paginate(5);
        return view('customer-edit');
    }
    public function delete()
    {
        $customer = Customer::paginate(5);
        return view('customer-delete');
    }
}
