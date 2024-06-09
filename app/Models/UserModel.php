<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class UserModel extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $table = 'admin';
    protected $primaryKey = 'kd_admin';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
    protected $allowedFields = ['kd_admin', 'username', 'password', 'nama'];

    public $timestamps = false;

    protected $guarded = [''];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}