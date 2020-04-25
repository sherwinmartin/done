<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    /**
     * Belongs to user
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
