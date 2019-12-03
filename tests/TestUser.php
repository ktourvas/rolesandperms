<?php

namespace Tests;

use Illuminate\Foundation\Auth\User as User;
use ktourvas\rolesandperms\Entities\HasPersmissions;
use ktourvas\rolesandperms\Entities\HasRoles;

class TestUser extends User {
    use HasPersmissions, HasRoles;
}