<?php

namespace Database\Factories;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $platform = Platform::where('name', 'YouTube')->first();

        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://youtu.be/tAGnKpE4NCI',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/tAGnKpE4NCI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'platform_id' => $platform->id,
        ];
    }
}
