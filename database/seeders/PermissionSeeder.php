<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        Permission::create([
            'name' => 'index roles',
        ]);
        Permission::create([
            'name' => 'create role',
        ]);
        Permission::create([
            'name' => 'show role',
        ]);
        Permission::create([
            'name' => 'edit role',
        ]);
        Permission::create([
            'name' => 'update role',
        ]);

        Permission::create([
            'name' => 'index courses',
        ]);
        Permission::create([
            'name' => 'create course',
        ]);
        Permission::create([
            'name' => 'show course',
        ]);
        Permission::create([
            'name' => 'edit course',
        ]);
        Permission::create([
            'name' => 'delete course',
        ]);

        Permission::create([
            'name' => 'show dashboard',
        ]);

        Permission::create([
            'name' => 'index users',
        ]);
       Permission::create([
            'name' => 'edit user',
        ]);

    }

}
