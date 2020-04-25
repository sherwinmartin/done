<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentType extends Model
{
    protected $table = 'incident_types';

    /**
     * Has many incidents.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    /**
     * Store record.
     * @param $request
     * @return bool
     */
    public static function storeRecord($request)
    {
        $incident_type = new IncidentType;

        $incident_type->name        = $request->name;

        if ($incident_type->save())
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
        $incident_type = IncidentType::find($request->id);

        $incident_type->name        = $request->name;

        if ($incident_type->save())
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
        if (IncidentType::find($request->id)->delete)
        {
            return true;
        }

        return false;
    }
}
