<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class AkunAdmin extends Model implements AuthenticatableContract
{
    use HasFactory, Authorizable, authenticatable;

    protected $table = 'akun_admin';

    protected $fillable = [
        'username',
        'password',
        'file'
    ];
    protected $hidden = [
        'password'
    ];
    protected $primaryKey = 'id';
}
