<?php

namespace App\Listeners;

use App\Events\UserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
class UserMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     * Sending the mail to admin while adding a user using event and listener
     * @param  \App\Events\UserEvent  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        $data = array('name'=>$event->user['name']);
        Mail::send('mail', $data, function($message) use($event){
            $message->to('abc@mailinator.com', $event->user['slug'])->subject
               ('Laravel Basic Testing Mail');
            $message->from('xyz@mailinator.com',$event->user['name']);
         });
    }
}
