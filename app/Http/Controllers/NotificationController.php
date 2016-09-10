<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket as Ticket;
use App\Cased as Cased;
use App\Appoinment as Appoinment;


class NotificationController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = 'open';
        $result =[];
        $tickets= Ticket::notification($id)->get();
        $i = 0;
        foreach ($tickets as $ticket) {
            $result[$i]['type'] = 'Ticket';
            $result[$i]['id'] = $ticket->id;
            $result[$i]['title'] = $ticket->ticket_name;
            $result[$i]['mode'] = 'normal';
            $i++;
        }
        $cases= Cased::notification($id)->get();
        foreach ($cases as $cased) {
            $result[$i]['type'] = 'Case';
            $result[$i]['id'] = $cased->id;
            $result[$i]['title'] = $cased->case_name;
            $result[$i]['mode'] = 'critical';
            $endDate = time();
            $startDate = $cased->expire;
            $days = ceil((strtotime($startDate) - $endDate) / (60 * 60 * 24));
            if($days>2)
                $result[$i]['mode'] = 'normal';
            $i++;
        }

        $notifications= Appoinment::notification($id)->get();
        foreach ($notifications as $notification) {
            $endDate = time();
            $startDate = $notification->app_date;
            $days = ceil((strtotime($startDate) - $endDate) / (60 * 60 * 24));
            if($days == 0){
                $result[$i]['type'] = 'Appointment';
                $result[$i]['id'] = $notification->id;
                $result[$i]['title'] = 'Appointment - '.$notification->app_time;
                $result[$i]['mode'] = 'appointment';
                $i++;
            }
        }

        // return \Response::json(ceil((strtotime($startDate) - $endDate) / (60 * 60 * 24)));
        return \Response::json($result);
    }

}
