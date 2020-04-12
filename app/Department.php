<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    public function users()
    {
        return $this->belongsToMany(User::class, 'department_user', 'department_id', 'user_id');
    }
}
