<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PusherEvent;
class TestController extends Controller
{

    /**
     * 
    */
    public function sender(){
        return view('pusher.sender');
    }

    /**
     * 
    */
    public function sendMessage(Request $request){
        event(new PusherEvent($request->message));
    }

        /**
     * 
    */
    public function receiver(){
        return view('pusher.receiver');
    }
}
