<?php

namespace Tests\Unit;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ktourvas\rolesandperms\Entities\ModelPermissionsSet;
use ktourvas\rolesandperms\Entities\RecordPermissionsSet;
use Tests\BaseTestCase;

class UserPermissionsTest extends BaseTestCase
{

    public function testModelPermissions() {

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->permissions);

        $this->assertFalse( $this->user->canViewAny( User::class ) );

        $this->assertFalse( $this->user->canView( $this->user ) );

        $this->assertFalse( $this->user->canCreate( User::class ) );

        $this->assertFalse( $this->user->canDelete( $this->user ) );

        $this->assertFalse( $this->user->canForceDelete( $this->user ) );

        $this->assertFalse( $this->user->canRestore( $this->user ) );

        $this->setData();

        $this->assertFalse( $this->user->canViewAny( User::class ) );

        $this->assertTrue( $this->user->canCreate( User::class ) );

        $this->assertTrue( $this->user->canView( $this->OwnedUserObject ) );

        $this->assertFalse( $this->user->canUpdate( $this->OwnedUserObject ) );

        $this->assertTrue( $this->user->canDelete( $this->OwnedUserObject ) );

    }

    /**
     * create a user instance and give testing user rights on it
     */

    private function setData() {

        $this->OwnedUserObject = new User();

        $this->OwnedUserObject->id = 999;

        $permission = ModelPermissionsSet::create([
            'policy' => User::class,
            'viewAny' => 0,
            'create' => 1,
            'delete' => 0,
            'forcedelete' => 1,
            'restore' => 1,
        ]);

        $recordPermission = RecordPermissionsSet::create([
            'record_id' => $this->OwnedUserObject->id,
            'view' => 1,
            'update' => 0,
            'delete' => 1,
        ]);

        $permission->records()->save($recordPermission);

        $this->user->permissions()->save($permission);

    }

}