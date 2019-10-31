<?php

namespace ktourvas\rolesandperms\Entities;

use Illuminate\Database\Eloquent\Model;

class RecordPermissionsSet extends Model
{
    protected $table = 'rap_record_permissions';

    protected $fillable = [ 'record_id', 'view', 'update', 'delete' ];

    public function set() {

        return $this->belongsTo('ktourvas\rolesandperms\Entities\ModelPermissionsSet', 'policy_id');

    }
}