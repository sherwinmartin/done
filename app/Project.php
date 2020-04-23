<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    /**
     * Belongs to project status.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectStatus()
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    /**
     * Has many tasks.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Belongs to many users.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }

    /**
     * Store record.
     * @param $request
     * @return bool
     */
    public function storeRecord($request)
    {
        $project = new Project;

        $project->project_status_id         = $request->project_status_id;
        $project->name                      = $request->name;
        $project->description               = $request->description;

        if ($project->save())
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
    public function updateRecord($request)
    {
        $project = Project::find($request->id);

        $project->project_status_id         = $request->project_status_id;
        $project->name                      = $request->name;
        $project->description               = $request->description;

        if ($project->save())
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
        if (Project::find($request->id)->delete())
        {
            return true;
        }

        return false;
    }
}
