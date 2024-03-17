<?php

namespace Database\Factories;

use App\Models\Institute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $groups = [
            'ПИ-21-1', 'АИ-21-1', 'АС-21-1', 'ПИ-20-1', 'AИ-23-1', 'АС-21-2', 'АС-22-1', 'АИ-22-1', 'ПИ-22-1', 'ПИ-22-2'
        ];

        // Создаем массив, который будет содержать первые две буквы и соответствующие им институты
        $institutes = [
            'ПИ' => 1, // ПИ соответствует институту с id 1
            'АИ' => 2, // АИ соответствует институту с id 2
            'АС' => 3, // АС соответствует институту с id 3
            // Добавьте другие институты по мере необходимости
        ];

        $randomGroup = $this->faker->unique()->randomElement($groups);
        $instituteId = $institutes[substr($randomGroup, 0, 2)];
        //$instituteId = 1;

        return [
            'title' => $randomGroup,
            'institute_id' => $instituteId,
        ];
    }
}
