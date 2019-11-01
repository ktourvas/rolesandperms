<?php

namespace ktourvas\rolesandperms\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait HasPersmissions
 * @package ktourvas\rolesandperms\Entities
 */
trait HasPersmissions {

    /**
     * Implement the viewAny permission for the given model parameter
     * @param string|callable $model
     * @return bool
     */

    public function canViewAny($model) {
        return $this->permissions()->where('policy',  $model )->where('viewany', 1)->count() == 1;
    }

    /**
     * Implement the view permission for the given model parameter
     * @param object $model
     * @return bool
     */

    public function canView($model) {

        return $this
                ->permissions()

                ->where('policy', get_class($model) )

                ->where(function($q) use ($model) {

                    $q
                        ->where('viewany', 1)
                        ->orWhereHas('records', function($q) use ($model) {
                            $q
                                ->where( 'record_id', $model->id )
                                ->where('view', 1);
                        });
                })
                ->count() == 1;
    }

    /**
     * Implement the create permission for the given model parameter
     * @param string|callable $model
     * @return bool
     */

    public function canCreate($model)
    {
        return $this->permissions()->where('policy', $model )->where('create', 1)->count() == 1;
    }

    /**
     * Implement the update permission for the given model parameter
     * @param object $model
     * @return bool
     */

    public function canUpdate( $model )
    {
        return $this
                ->permissions()
                ->where('policy', get_class($model))
                ->where(function($q) use ($model) {
                    $q->where('update', 1)
                        ->orWhereHas('records', function($q) use ($model) {
                            $q->where('record_id', $model->id)->where('update', 1);
                        });
                })
                ->count() > 0;
    }

    /**
     * Implement the delete permission for the given model parameter
     * @param object $model
     * @return bool
     */

    public function canDelete($model)
    {
        return $this
                ->permissions()
                ->where('policy', get_class($model) )
                ->where(function($q) use ($model) {
                    $q->where('delete', 1)
                        ->orWhereHas('records', function($q) use ($model) {
                            $q->where('record_id', $model->id)->where('delete', 1);
                        });
                })
                ->count() == 1;
    }

    /**
     * Implement the restore permission for the given model parameter
     * @param object $model
     * @return bool
     */

    public function canRestore($model)
    {
        return $this
                ->permissions()
                ->where('policy', get_class($model) )
                ->where(function($q) use ($model) {
                    $q->where('restore', 1)
                        ->orWhereHas('records', function($q) use ($model) {
                            $q->where('record_id', $model->id)->where('restore', 1);
                        });
                })
                ->count() == 1;
    }

    /**
     * Implement the forceDelete permission for the given model parameter
     * @param object $model
     * @return bool
     */

    public function canForceDelete($model)
    {
        return $this
                ->permissions()
                ->where('policy', get_class($model) )
                ->where(function($q) use ($model) {
                    $q->where('forcedelete', 1)
                        ->orWhereHas('records', function($q) use ($model) {
                            $q->where('record_id', $model->id)->where('forcedelete', 1);
                        });
                })
                ->count() == 1;
    }

    /**
     * return the collection of permissions associated with the user
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function permissions() {
        return $this->hasMany('ktourvas\rolesandperms\Entities\ModelPermissionsSet', 'user_id');
    }

}