<?php

namespace App\Http\Controllers;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Show dashboard view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('dashboard/post');
    }
}
