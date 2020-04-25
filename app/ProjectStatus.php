<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $table = 'project_statuses';

    /**
     * Has many projects.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Store record.
     * @param $request
     * @return bool
     */
    public static function storeRecord($request)
    {
        $project_status = new ProjectStatus;

        $project_status->name       = $request->name;

        if ($project_status->save())
        {
            return true;
        }

        return false;
    }

    /**
     * Update record.
     * @param $request
     * @return bool
     */
    public static function updateRecord($request)
    {
        $project_status = ProjectStatus::find($request->id);

        $project_status->name       = $request->name;

        if ($project_status->save())
        {
            return true;
        }

        return false;
    }

    /**
     * Delete record.
     * @param $request
     * @return bool
     */
    public static function deleteRecord($request)
    {
        if (ProjectStatus::find($request->id)->delete())
        {
            return true;
        }

        return false;
    }
}
