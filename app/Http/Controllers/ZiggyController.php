<?php

namespace App\Http\Controllers;

use Tightenco\Ziggy\Ziggy;

class ZiggyController
{
    public function index()
    {
        return response()->json(new Ziggy());
    }
}
