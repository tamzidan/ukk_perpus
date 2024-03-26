<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin'
            ],
            ['name' => 'admin']
        );
        $role_petugas = Role::updateOrCreate(
            [
                'name' => 'petugas'
            ],
            ['name' => 'petugas']
        );
        $role_user = Role::updateOrCreate(
            [
                'name' => 'user'
            ],
            ['name' => 'user']
        );
        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard'
            ],
            ['name' => 'view_dashboard']
        );
        $role_admin->givePermissionTo($permission);

        $user = User::find(1);
        $user->assignRole('admin');

   

    }
}