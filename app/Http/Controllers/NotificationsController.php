<?php

namespace App\Http\Controllers;

class NotificationsController extends Controller
{
    public function index()
    {
        return view('notifications.index');
    }
}
