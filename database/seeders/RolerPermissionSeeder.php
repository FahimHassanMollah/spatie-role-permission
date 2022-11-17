<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolerPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        $adminModule = Module::create(['name' => 'admin']);
        $dashboardModule = Module::create(['name' => 'dashboard']);
        $blogModule = Module::create(['name' => 'blog']);
        $profileModule = Module::create(['name' => 'blog']);
        $roleModule = Module::create(['name' => 'role']);

        // Permission List as array
        $permissions = [

          
            [
                'module_id' => $dashboardModule->id,
                'permissions' => ['dasboard.view']
            ],
            [
                'module_id' => $blogModule->id,
                'permissions' => [
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],
            [
                'module_id' => $adminModule->id,
                'permissions' => [
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'module_id' => $roleModule->id,
                'permissions' => [
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'module_id' => $profileModule->id,
                'permissions' => [
                    'profile.view',
                    'profile.edit'
                ]
            ],


        ];

        foreach ($permissions as $permission) {

            foreach ($permission['permissions'] as  $val) {
                $createdPermission = Permission::create(['name' => $val,'module_id' => $permission['module_id']]);
                $roleSuperAdmin->givePermissionTo($createdPermission);
                $createdPermission->assignRole($roleSuperAdmin);
            }


        }




        // assign permission
    }
}
