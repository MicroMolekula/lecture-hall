<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'Математика', 'Физика', 'Химия', 'История',
            'Литература', 'Биология', 'Экономика', 'География'
        ];
        return [
            'title' => $this->faker->unique()->randomElement($subjects),
        ];
    }
}
