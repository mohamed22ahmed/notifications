<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function index(){
        // Mail::to('mohammedahmedhammam113@gmail.com')->send(new DemoMail());
        $users = User::all();
        // for the database notification: when user clicks on notification we will perform $this->notification->markAsRead() 
        // we can get the whole notifications by using $user->notifications();
        // we can get read notifications by using $user->readNotifications()
        // we can get unread notifications by using $user->unreadNotifications()
        foreach($users as $user)
            $user->notify(new InvoicePaid());
        return 'done';
    }
}
