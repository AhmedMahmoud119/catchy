<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',

            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            'order-list',
            'order-edit',

            'update-stock',
            'update-price',

            'report',
            'analysis',

            'country-list',
            'country-create',
            'country-edit',
            'country-delete',

            'state-list',
            'state-create',
            'state-edit',
            'state-delete',

            'shipping-company-list',
            'shipping-company-create',
            'shipping-company-edit',
            'shipping-company-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name'       => $permission,
                'guard_name' => 'admin',
            ], [
                'name'       => $permission,
                'guard_name' => 'admin',
            ]);
        }

        $user = Admin::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        $role = Role::updateOrCreate(['name' => 'Admin', 'guard_name' => 'admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


    }
}
