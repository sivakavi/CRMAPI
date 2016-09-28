<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket as Ticket;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket= Ticket::info()->get();
    	return \Response::json($ticket);
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
        if(Ticket::create($input)){
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
        $ticket= Ticket::find($id);
        return \Response::json($ticket);
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
        $ticket = Ticket::findOrFail($id);
        
        $input = $request->all();
        
        if($ticket->fill($input)->save()){
        	return response()->json(['status' => '1']);
        }
        return response()->json(['status' => '0']);
        
    }

    public function getOpenTicket()
    {
        $ticket = Ticket::info()->where('status','open')->get();
        return \Response::json($ticket);
    }

    public function getCloseTicket()
    {
        $ticket = Ticket::info()->where('status','close')->get();
        return \Response::json($ticket);
    }

    public function getOpenTicketUser($id){
        $ticket = Ticket::info()->where('user_id',$id)->where('status','open')->get();
        return \Response::json($ticket);
    }

    public function getCloseTicketUser($id){
        $ticket = Ticket::info()->where('user_id',$id)->where('status','close')->get();
        return \Response::json($ticket);
    }

    public function getTicketYear($year){
        $ticket = Ticket::info()->whereYear('created_at','=',$year)->get();
        return \Response::json($ticket);
    }

    public function getTicketYearMonth($year, $month){
        $ticket = Ticket::info()->whereYear('created_at','=',$year)->whereMonth('created_at','=',$month)->get();
        return \Response::json($ticket);
    }

    public function getTicketUser($user){
        $ticket = Ticket::info()->where('user_id',$user)->get();
        return \Response::json($ticket);
    }

    public function getTicketUserYear($user, $year){
        $ticket = Ticket::info()->where('user_id',$user)->whereYear('created_at','=',$year)->get();
        return \Response::json($ticket);
    }

    public function getTicketUserYearMonth($user, $year, $month){
        $ticket = Ticket::info()->where('user_id',$user)->whereYear('created_at','=',$year)->whereMonth('created_at','=',$month)->get();
        return \Response::json($ticket);
    }

}
