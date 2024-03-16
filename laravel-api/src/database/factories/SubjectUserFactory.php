<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectUser>
 */
class SubjectUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniqueUserSubjectPairs = collect();

        return [
            'user_id' => function () use ($uniqueUserSubjectPairs) {
                $userId = User::where('role', 'teacher')->pluck('id')->random();

                return $userId;
            },
            'subject_id' => function (array $attributes) use ($uniqueUserSubjectPairs) {
                $subjectId = Subject::pluck('id')->random();

                while ($uniqueUserSubjectPairs->contains(function ($pair) use ($attributes, $subjectId) {
                    return $pair['user_id'] === $attributes['user_id'] && $pair['subject_id'] === $subjectId;
                })) {
                    $subjectId = Subject::pluck('id')->random();
                }

                $uniqueUserSubjectPairs->push([
                    'user_id' => $attributes['user_id'],
                    'subject_id' => $subjectId,
                ]);

                return $subjectId;
            },
        ];
    }

}
