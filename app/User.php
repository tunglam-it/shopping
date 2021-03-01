<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

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
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user',
            'user_id', 'role_id');
    }

    public function checkPermissionAccess()
    {
        //b1: lay dc tat ca quyen user dang login he thong
        //b2: so sanh gia tri dua vao cua route hien tai xem co ton tai trong cac quyen minh lay dc hay k
        return true;
    }
}
