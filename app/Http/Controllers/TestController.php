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
        foreach($users as $user)
            $user->notify(new InvoicePaid());
        return 'done';
    }
}
