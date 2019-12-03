<?php

namespace ktourvas\rolesandperms\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait HasRoles
 * @package ktourvas\rolesandperms\Entities
 */
trait HasRoles {

    public function roles() {
        return $this->belongsToMany('ktourvas\rolesandperms\Entities\Role',
            'rap_user_roles',
            'role_id',
            'user_id');
    }

    public function userIs($role) {
        return $this->roles()->where('name', $role)->exists();
    }

}