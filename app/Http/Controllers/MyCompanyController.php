<?php

namespace App\Http\Controllers;

use App\Company;
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
     * Create user.
     * @return mixed
     */
    public function createUser()
    {
        $data = [
            'page_title'    => '',
            'navi_group'    => '',
            'navi_submenu'  => '',
            'user'          => new User
        ];

        return view('my_company.users.create', $data);
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
            'page_title'    => '',
            'navi_group'    => '',
            'navi_submenu'  => '',
            'user'          => $user
        ];

        return view('my_company.users.edit', $data);
    }

    /**
     * Edit company.
     * @param Company $company
     * @return mixed
     */
    public function editCompany(Company $company)
    {
        if ($company->id <> $this->company_id)
        {
            return abort(404);
        }

        $data = [
            'page_title'    => '',
            'navi_group'    => '',
            'navi_submenu'  => '',
            'company'       => $company
        ];

        return view('my_company.companies.edit', $data);
    }
}
