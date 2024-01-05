<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['info'] = 'Home';
        $data['page'] = 'Dashboard';
        return view ('contents.dashboard',compact('data'));
    }
}
