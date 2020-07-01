<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
