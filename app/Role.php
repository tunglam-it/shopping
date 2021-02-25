<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $guarded=[];
//    public function roles()
//    {
//        return $this->belongsToMany(User::class, 'role_user',
//            'role_id','user_id');
//    }
}
