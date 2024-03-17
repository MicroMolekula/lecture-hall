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

        // Получаем список всех пользователей с ролью "teacher"
        $teacherIds = User::where('role', 'teacher')->pluck('id');

        return [
            'user_id' => function () use ($teacherIds) {
                // Выбираем случайный идентификатор пользователя из списка учителей
                return $teacherIds->random();
            },
            'subject_id' => function (array $attributes) use ($uniqueUserSubjectPairs) {
                // Получаем идентификаторы всех предметов
                $subjectIds = Subject::pluck('id');

                // Выбираем случайный идентификатор предмета
                $subjectId = $subjectIds->random();

                // Проверяем, что у данного пользователя уже нет такого предмета
                while ($uniqueUserSubjectPairs->contains(function ($pair) use ($attributes, $subjectId) {
                    return $pair['user_id'] === $attributes['user_id'] && $pair['subject_id'] === $subjectId;
                })) {
                    // Если предмет уже присутствует у пользователя, выбираем другой случайный предмет
                    $subjectId = $subjectIds->random();
                }

                // Добавляем пару user_id и subject_id в коллекцию, чтобы избежать повторений
                $uniqueUserSubjectPairs->push([
                    'user_id' => $attributes['user_id'],
                    'subject_id' => $subjectId,
                ]);

                return $subjectId;
            },
        ];
    }


}
