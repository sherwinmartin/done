<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyCompany extends Model
{
    protected $table = 'companies';

    /**
     * Update record.
     * @param $request
     * @return bool
     */
    public static function updateRecord($request)
    {
        $company = Company::find($request->id);

        $company->name          = $request->name;
        $company->address       = $request->address;
        $company->city          = $request->city;
        $company->state         = $request->state;
        $company->zip           = $request->zip;

        if ($company->save())
        {
            return true;
        }

        return false;
    }

    /**
     * Get users from company.
     * @param $company_id
     * @return mixed
     */
    public static function getUsers($company_id)
    {
        return User::where('company_id', $company_id)
            ->with('role');
    }

    /**
     * Get company projects.
     * @param $company_id
     * @return mixed
     */
    public static function getProjects($company_id)
    {
        return Project::where('company_id', $company_id)
            ->with('projectStatus')
            ->with('tasks')
            ->with('users');
    }
}
