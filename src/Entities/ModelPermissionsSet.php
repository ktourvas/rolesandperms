<?php

namespace ktourvas\rolesandperms\Entities;

use Illuminate\Database\Eloquent\Model;

class ModelPermissionsSet extends Model
{
    protected $table = 'rap_model_permissions';

    protected $fillable = [ 'policy', 'view', 'create', 'update', 'delete', 'restore', 'forcedelete' ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function records() {

        return $this->hasMany('ktourvas\rolesandperms\Entities\RecordPermissionsSet', 'policy_id');

    }

}