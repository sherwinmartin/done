<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display records
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'page_title'        => 'Users',
            'navi_group'        => 'users',
            'navi_submenu'      => 'users.index',
            'users'             => User::get()
        ];
        return view('users.index');
    }
    /**
     * Store record.
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        if (User::storeRecord($request))
        {
            return back()->with('success', 'User created.');
        }

        return back()->withInput()->with('error', 'User failed to be created.');
    }

    /**
     * Update record.
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request)
    {
        if (User::updateRecord($request))
        {
            return back()->with('success', 'User updated.');
        }

        return back()->withInput()->with('error', 'User failed to be updated.');
    }
}
