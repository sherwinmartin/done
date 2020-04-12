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
}
