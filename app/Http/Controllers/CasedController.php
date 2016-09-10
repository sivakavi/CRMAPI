<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cased as Cased;


class CasedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$case= Cased::info()->get();
    	return \Response::json($case);
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
        if(Cased::create($input)){
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
        $case = Cased::info()->find($id);
        return \Response::json($case);
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
        $case = Cased::findOrFail($id);
        
        $input = $request->all();
        
        if($case->fill($input)->save()){
        	return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);
        
    }

    public function getOpenCase()
    {
        $case = Cased::opencase()->get();
        return \Response::json($case);
    }

    public function getCloseCase()
    {
        $case = Cased::closecase()->get();
        return \Response::json($case);
    }

    public function getOpenCaseUser($id){
        $case = Cased::info()->where('user_id',$id)->where('status','open')->get();
        return \Response::json($case);
    }

    public function getCloseCaseUser($id){
        $case = Cased::info()->where('user_id',$id)->where('status','close')->get();
        return \Response::json($case);
    }

}
