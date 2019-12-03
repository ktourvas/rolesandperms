<?php

namespace ktourvas\rolesandperms\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'rap_roles';

    protected $fillable = [ 'name' ];

}