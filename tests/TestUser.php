<?php

namespace Tests;

use Illuminate\Foundation\Auth\User as User;
use ktourvas\rolesandperms\Entities\HasPersmissions;

class TestUser extends User {
    use HasPersmissions;
}