<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    /**
     * Belongs to project.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Store record.
     * @param $request
     * @return bool
     */
    public static function storeRecord($request)
    {
        $task = new Task;

        $task->project_id       = $request->project_id;
        $task->hours            = $request->hours;
        $task->description      = $request->description;
        $task->task_date        = $request->task_date;

        if ($task->save())
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
        $task = Task::find($request->id);

        $task->project_id       = $request->project_id;
        $task->hours            = $request->hours;
        $task->description      = $request->description;
        $task->task_date        = $request->task_date;

        if ($task->save())
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
        if (Task::find($request->id)->delete())
        {
            return true;
        }

        return false;
    }
}
