<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCompanyController extends Controller
{
    private $company_id;

    public function __construct()
    {
        $this->middleware('role:admin,owner,manager');
        $this->company_id = Auth::User()->company_id;
    }

    /**
     * Edit user.
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function editUser(User $user)
    {
        if ($user->company_id <> $this->company_id)
        {
            return abort(404);
        }

        $data = [
            'user'      => $user
        ];

        return view('my_company.user.edit', $data);
    }
}
