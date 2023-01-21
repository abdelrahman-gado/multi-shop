<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index()
    {
        return view('shop.contact');
    }

    function sendMessageViaEmail() {
        
    }
}
