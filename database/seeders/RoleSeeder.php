<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user->givePermissionTo('edit_users');
        $user->assignRole('admin');
        $user->assignRole('pustakawan');
    }
}
