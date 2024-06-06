<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{

    public function index(){
        return inertia::render('index',[
            'customers'=>Customer::all()->map(function($customer){
                return[
                    'id'=>$customer->id,
                    'name'=>$customer->name
                ];
            })
        ]);
    }
    public function create(){
        return inertia::render('create');
    }

    public function edit(Customer $customer){
        return inertia::render('edit',[
            'customer'=>$customer
        ]);
    }

    public function update(Request $request, Customer $customer){
        $validated=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:customers',
            'phone'=>'required|unique:customers|max:14|min:10'
        ]);
        $customer->update($validated);
        return Redirect::route('customers.index')->with('message', 'Customer Updated Successfuly');
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|',
            'phone'=>'require|max:14|min:10'
        ]);
        Customer::create($validated);
        return Redirect::route('customers.index')->with('message', 'Customer Created Successfuly');

    }

    public function destroy(Customer $customer){
        $customer->delete();
        return Redirect::route('customers.index')->with('message', 'Customer Deleted Successfuly');;
    }
}
