<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Belongs to many departments.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_user', 'user_id', 'department_id');
    }

    /**
     * Has many incidents.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    /**
     * Belongs to many projects.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user', 'user_id', 'project_id');
    }

    /**
     * Belongs to role.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Store record.
     * @param $request
     * @return bool
     */
    public static function storeRecord($request)
    {
        $user = new User;
        $user->role_id              = $request->role_id;
        $user->username             = $request->username;
        $user->email                = $request->email;
        $user->password             = Hash::make($request->password);
        $user->hire_date            = $request->hire_date;
        $user->start_date           = $request->start_date;
        $user->is_enabled           = $request->is_enabled;

        if ($user->save())
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
        $user = User::find($request->id);
        $user->role_id              = $request->role_id;
        $user->username             = $request->username;
        $user->email                = $request->email;
        if ($request->password)
        {
            $user->password             = Hash::make($request->password);
        }
        $user->hire_date            = $request->hire_date;
        $user->start_date           = $request->start_date;
        $user->is_enabled           = $request->is_enabled;

        if ($user->save())
        {
            return true;
        }

        return false;

    }
}
