<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Membership as Membership;


class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$membership= Membership::all();
    	return \Response::json($membership);
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
        if(Membership::create($input)){
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
        $membership = Membership::findOrFail($id);
        return \Response::json($membership);
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
        $membership = Membership::findOrFail($id);
        
        $input = $request->all();
        
        if($membership->fill($input)->save()){
        	return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);
        
    }

}
