<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer as Customer;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$customer= Customer::with('membership')->get();
    	return \Response::json($customer);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        if(Customer::create($input)){
        	return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $customer = Customer::with('membership')->find($id);
        return \Response::json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $customer = Customer::findOrFail($id);
        
        $input = $request->all();
        
        if($customer->fill($input)->save()){
        	return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);
        
    }

    public function getHotCustomer()
    {
        $customer = Customer::hot()->get();
        return \Response::json($customer);
    }

    public function updateHotCustomer(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $hot = \Input::get('hot');
        if($customer->update(['hot' => $hot])){
            return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);
    }

    public function updateMembership(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $membership_id = \Input::get('membership_id');
        if($customer->update(['membership_id' => $membership_id])){
            return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);
    }


}
