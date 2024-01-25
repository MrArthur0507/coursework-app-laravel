<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseWork>
 */
class CourseWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'author_id' => Author::factory(),
            'manager_id' => Manager::factory(),
            'image_path' => 'images/default.jpg',
        ];
    }
}
