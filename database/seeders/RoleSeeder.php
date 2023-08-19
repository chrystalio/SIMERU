<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'System Administrator'],
            ['name' => 'Employee'],
            ['name' => 'Manager'],
            ['name' => 'Client'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
