<?php

namespace ktourvas\rolesandperms\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'rap_roles';

    protected $fillable = [ 'name' ];

    /**
     * Get the owning commentable model.
     */
    public function rap_user_roleables($model)
    {
        return $this->morphedByMany($model, 'rap_user_roles');
    }

}