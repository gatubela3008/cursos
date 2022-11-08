<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create ([
            'name' => 'Gustavo Ettedgui',
            'email' => 'gustavo.ettedgui@gmail.com',
            'password' => bcrypt('gatubela'),
        ]);

        User::factory(99)->create();
    }
}
