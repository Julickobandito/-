<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * List of applications to add.
     */
    private $permissions_admin = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'museum-list',
        'museum-create',
        'museum-edit',
        'museum-delete'
    ];

    private $permissions_accountant = [
        'museum-object-list',
        'museum-object-create',
        'museum-object-edit',
        'museum-object-view',
        //'museum-list',
        //'museum-view',
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*foreach ($this->permissions_admin as $permission) {
            Permission::create(['name' => $permission]);
        }*/
        /*foreach ($this->permissions_accountant as $permission) {
            Permission::create(['name' => $permission]);
        }*/

        // find admin User and assign the role to him.
        //$user = User::find(1);
        // $role = Role::create(['name' => 'admin']);

        $user = User::find(2);
        $role = Role::create(['name' => 'accountant']);

//        $role = Role::where('name', 'admin')->first();

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}