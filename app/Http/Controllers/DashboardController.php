<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'page_title'        => '',
            'navi_group'        => '',
            'navi_submenu'      => ''
        ];

        return view('dashboard', $data);
    }
}
