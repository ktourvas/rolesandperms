<?php

namespace Tests\Unit;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ktourvas\rolesandperms\Entities\Role;
use Tests\BaseTestCase;

class UserRolesTest extends BaseTestCase
{

    public function testUserRoles() {

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->roles);

        $role = Role::where('name', 'admin')->first();

        $this->assertInstanceOf('ktourvas\rolesandperms\Entities\Role', $role);

        $this->assertFalse( $this->user->userIs('admin') );

        $this->user->roles()->sync([$role->id]);

        $this->user->load('roles');

        $this->assertTrue( $this->user->userIs('admin') );

    }

    /**
     * create a user instance and give testing user rights on it
     */

    private function setData() {}

}