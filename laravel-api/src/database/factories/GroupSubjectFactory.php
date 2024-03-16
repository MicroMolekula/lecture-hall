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
        // Получаем список всех id групп и предметов
        $groupIds = Group::pluck('id')->toArray();
        $subjectIds = Subject::pluck('id')->toArray();

        // Проверяем, чтобы было не менее трех доступных id групп и хотя бы один доступный id предмета
        if (count($groupIds) < 3 || count($subjectIds) < 1) {
            throw new \Exception('Недостаточно данных для создания уникальной пары');
        }

        // Выбираем случайный id группы, удаляем его из массива и повторяем этот процесс еще два раза
        $randomGroupIds = [];
        for ($i = 0; $i < 3; $i++) {
            $randomIndex = array_rand($groupIds);
            $randomGroupId = $groupIds[$randomIndex];
            $randomGroupIds[] = $randomGroupId;
            unset($groupIds[$randomIndex]);
        }

        // Выбираем случайный id предмета
        $randomSubjectId = $subjectIds[array_rand($subjectIds)];

        return [
            'group_id' => $randomGroupIds[array_rand($randomGroupIds)],
            'subject_id' => $randomSubjectId,
        ];
    }

}
