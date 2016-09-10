<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Appoinment as Appoinment;


class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$appoinment = Appoinment::info()->get();
    	return \Response::json($appoinment);
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
        if(Appoinment::create($input)){
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
        $appoinment = Appoinment::info()->find($id);
        return \Response::json($appoinment);
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
        $appoinment = Appoinment::findOrFail($id);
        
        $input = $request->all();
        
        if($appoinment->fill($input)->save()){
        	return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);
        
    }

    public function getAppoinmentUser($id){
        $appoinment = Appoinment::info()->where('user_id',$id)->get();
        return \Response::json($appoinment);
    }

    public function getAppoinmentUserOpen($id){
        $appoinment = Appoinment::info()->where('user_id',$id)->where('status','open')->get();
        return \Response::json($appoinment);
    }

    public function getAppoinmentUserUpcoming($id){
        $appoinment = Appoinment::info()->where('user_id',$id)->where('status','open')->where('app_date','>=',date("Y-m-d"))->get();
        return \Response::json($appoinment);
    }

    public function getAppoinmentUserClose($id){
        $appoinment = Appoinment::info()->where('user_id',$id)->where('status','close')->get();
        return \Response::json($appoinment);
    }

}
