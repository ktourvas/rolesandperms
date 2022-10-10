<?php

namespace ktourvas\rolesandperms\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait HasRoles
 * @package ktourvas\rolesandperms\Entities
 */
trait HasRoles {

    public function roles() {
        return $this->morphToMany('ktourvas\rolesandperms\Entities\Role', 'rap_user_roles');
    }

    public function userIs($role) {
        return $this->roles()
            ->where(function($q) use ($role) {
                if( is_array($role) ) {
                    $q->whereIn('name', $role);
                } else {
                    $q->where('name', $role);
                }
            })
            ->exists();
    }

}
