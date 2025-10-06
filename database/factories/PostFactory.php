<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $thumbnailArray = [
            'thumbnail_1.jpg',
            'thumbnail_2.jpeg',
            'thumbnail_3.png',
            'thumbnail_4.jpg',
        ];

        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'slug' => $this->faker->slug(),
            'thumbnail' => "thumbnails/" . $this->faker->randomElement($thumbnailArray),
            'status' => $this->faker->randomElement(['draft', 'published']),
        ];

    }
}
