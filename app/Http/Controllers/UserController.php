<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Http\Requests;
//use App\User;
use App\User as User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //dd(\Mail::raw('Text to e-mail', function($message)
         //	{
         //	    $message->from('sivakavij@gmail.com', 'Laravel');
        	
         //	    $message->to('sivakavi63@gmail.com');
        //	}
        // ));
    	$user= User::all();
    	return \Response::json($user);
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
        if(User::create($input))
        {
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
        $user = User::findOrFail($id);
        return \Response::json($user);
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
        $user = User::findOrFail($id);
        
        $input = $request->all();
        
        if($user->fill($input)->save()){
        	return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);
        
        
    }

    /**
     * Login the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //
        $email = \Input::get('user_name');
        $password = \Input::get('password');
        if($user = User::where('user_name', '=', $email)->where('password', '=', $password)->first()){
            return \Response::json($user);
        }
        return response()->json(['status' => '0']);

    }

    /**
     * Username the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkUserName(Request $request)
    {
        //
        $user_name = \Input::get('user_name');
        if($user = User::where('user_name', '=', $user_name)->first()){
            return response()->json(['status' => '1']);

        }
        return response()->json(['status' => '0']);

    }
}
