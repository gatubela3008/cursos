<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\LessonFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Contracts\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*  Storage::deleteDirectory('public/courses');
        Storage::makeDirectory('public/courses'); */

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(DescriptionSeeder::class);
        $this->call(CourseSeeder::class);
    }
}
