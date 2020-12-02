<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const MANAGER = 'manager';
    public const EMPLOYEE = 'employee';
    public const MEMBER = 'member';
    //

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
