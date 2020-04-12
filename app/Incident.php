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
}
