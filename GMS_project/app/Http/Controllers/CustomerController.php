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
        return view('/customer/customer',compact('customers'))->with ('i',request()->input('page',1)-1*5+4);
    }
    public function create()
    {
        $customer = Customer::paginate(5);
        return view('/customer/customer-create');
    }
    public function edit(Customer $customer)
    {
        return view('/customer/customer-edit',compact('customer'));
    }
    public function update(Request $request, Customer $customer){
        
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('thongbao', 'Cập nhật khách hàng thành công!');
    }
    public function destroy(Customer $customer)
    {
        $customer -> delete();
        return redirect()->route('customer.index')->with('thongbao', 'Xóa khách hàng thành công!');

    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|string|max:20',
            'plateNo' => 'required|string|max:15',
        ]);

        // Create a new customer record
        Customer::create($validatedData);
        return redirect()->route('customer.index')->with('thongbao', 'Thêm khách hàng thành công!');
    }

}
