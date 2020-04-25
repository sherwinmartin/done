<?php

namespace App\Http\Controllers;

use App\Company;
use App\MyCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display index page.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'page_title'        => 'My Dashboard',
            'navi_group'        => '',
            'navi_submenu'      => '',
            'company_users'     => MyCompany::getUsers(Auth::User()->company_id)
                                    ->get(),
            'company'           => Company::find(Auth::User()->company_id)
        ];

        return view('dashboard', $data);
    }
}
