<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::find(1);
        $user = User::find(2);

        $adminRole = Role::where('name', '=', 'admin')->first();
        $userRole = Role::where('name', '=', 'user')->first();

        $user->assignRole($userRole);
        $adminUser->assignRole($adminRole);
    }
}
