<?php

namespace App\Http\Controllers;

use App\Mail\MailTrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        Mail::to('kavita2aryal@gmail.com')->send(new MailTrap());
    }
}
