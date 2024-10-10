<?php

namespace JJCS\Tests\Models;

use Spatie\Permission\Traits\HasPermissions;

class User extends \Illuminate\Foundation\Auth\User
{
    use HasPermissions;
    public function guardName(){
        return "web";
    }
    protected $fillable = ['name', 'email', 'password'];
}
