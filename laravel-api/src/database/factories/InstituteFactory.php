<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institute>
 */
class InstituteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        $institutes = ['ИМИТ', 'ИСА', 'ИКН'];
        return [
            'title' => $this->faker->unique()->randomElement($institutes),
        ];
    }
}

