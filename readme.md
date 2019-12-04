# rolesandperms
A simple laravel package to help you manage user roles and authorisation within a Laravel based application.

## installation

Using composer:

```shell
$ composer require ktourvas/rolesandperms 
```

after installation run 

```bash
$ php artisan migrate
```

four tables are going to be created 

- rap_roles
- rap_user_roles
- rap_model_permissions
- rap_record_permissions

Update App\User model with the HasPermissions and/or HasRoles traits depending on individual needs. 
 
```php
use ktourvas\rolesandperms\Entities\HasPermissions;

class User extends Authenticatable
{
    use  HasRoles, HasPersmissions, Notifiable; 
```
## HasRoles trait

## HasPermissions trait
 
the trait provides the user model with a permissions onetoMany relation and extra wrapper methods for viewAny, view, create, update, delete, restore and forceDelete permission defaults. All of the above permission methods will result the equivalent table entries for the current user. The trait methods can then be used within any policy class in an application. 

```php
<?php

use App\User;
use some\model\path\SomeModel;

class SomeModelPolicy
{
    public function viewAny(User $user) {
        return $user->canViewAny(SomeModel::class);
    }

    public function view(User $user, SomeModel $someModel) {
        return $user->canView( $someModel );
    }

    public function create(User $user) {
        return $user->canDelete( SomeModel::class );
    }

    public function update(User $user, SomeModel $someModel) {
        return $user->canUpdate( $someModel );
    }

    public function delete(User $user, SomeModel $someModel) {
        return $user->canDelete( $someModel );
    }

    public function restore(User $user, SomeModel $someModel) {
        return $user->canRestore( $someModel );
    }

    public function forceDelete(User $user, SomeModel $someModel) {
        return $user->canForceDelete( $someModel );
    }
}
```

### add/update/remove permissions 

just like you would use any other eloquent model relationship 

```php
$user->permissions()->create([
    'policy' => SomeModel::class, 
    'viewany' => 1, 
    'create' => 1,
    'update' => 1,
    'delete'  => 1,
    'restore'  => 1,
    'forcedelete' => 1,
]);
 
$user->permissions()->where('policy', SomeModel::class)->update([ 
    'viewany' => 0, 
    'create' => 1,
    'update' => 1,
    'delete'  => 0,
    'restore'  => 1,
    'forcedelete' => 0,
]);

$user->permissions()->where('policy', SomeModel::class)->delete();
```

Specific record permissions can be set by the use of the records onetoMany relation on a ModelPermissionSet. Each RecordPermissionSet is a child of a model policy entry and defines the equivalent permissions on the level of the actual data records when needed. 

```php
$policy = $user->permissions()->create([
    'policy' => SomeModel::class, 
    'viewany' => 0, 
    'create' => 0,
    'update' => 0,
    'delete'  => 0,
    'restore'  => 0,
    'forcedelete' => 0,
]);

$policy->records()->create([
'record_id'=>1,
'view'=>1, 
]);
```
according to the above the user will be allowed to view only record with id = 1 of SomeModel.   