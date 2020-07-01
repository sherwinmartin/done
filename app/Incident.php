<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Incident extends Model
{
    protected $table = 'incidents';

    /**
     * Belongs to incident_types.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function incidentType()
    {
        return $this->belongsTo(IncidentType::class);
    }

    /**
     * Belongs to user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Update record.
     * @param $request
     * @return bool
     */
    public static function updateRecord($request)
    {
        $incident = Incident::find($request->id);

        $incident->user_id          = $request->user_id;
        $incident->incident_type_id = $request->incident_type_id;
        $incident->incident_date    = $request->incident_date;
        $incident->description      = $request->description;
        $incident->action_taken     = $request->action_taken;

        if ($request->employee_reviewed_date)
        {
            if ($incident->employee_reviewed_date == NULL)
            {
                $incident->employee_reviewed_date   = Carbon::now();
            }
        }else{
            $incident->employee_reviewed_date       = NULL;
        }

        if ($incident->save())
        {
            return true;
        }

        return false;
    }

    /**
     * Search record.
     * @param $request
     * @return mixed
     */
    public static function search($request)
    {
        return Incident::where(function ($query) use ($request)
        {
            if ($request->incident_type_id)
            {
                $query->where('incident_type_id', $request->incident_type_id);
            }

            if ($request->user_id)
            {
                $query->where('user_id', $request->user_id);
            }
        })->with('incidentType')
            ->with('user');

    }

    /**
     * Delete record.
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function deleteRecord($request)
    {
        if (Incident::find($request->id)->delete())
        {
            return redirect()->route('incidents.index')->with('success', 'Incident deleted.');
        }

        return back()->with('error', 'Incident failed to be deleted.');
    }
}
