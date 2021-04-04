<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        return Auth::user()->notifications()->get();
    }

    public function read($id)
    {
        return Auth::user()->notifications()->where('id', $id)->update(['read_at' => now()]);
    }

    public function find($type)
    {
        return Auth::user()->notifications()->where('type','App\Notifications\\'. $type)->get();
    }
}
