<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=GroupSubject>
 */
class GroupSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => Group::all()->random(1)[0]->id,
            'subject_id' => Subject::all()->random(1)[0]->id,
        ];
    }
}
