<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    private array $fio = [
        [
            [
                'Ксения',
                'Матвей',
                'Михаил',
                'Николай',
                'Егор',
                'Савелий',
                'Григорий',
                'Александр',
                'Максим',
                'Сергей',
                'Иван',
            ],
            [
                'Александрович',
                'Ярославович',
                'Владиславович',
                'Григорьевич',
                'Романович',
                'Глебович',
                'Арсеньевич',
                'Мирославович',
                'Артёмович',
                'Яковлевич',
            ],
            [
                'Александров',
                'Андреев',
                'Бабушкин',
                'Баранов',
                'Блинов',
                'Воронов',
                'Дроздов',
                'Иванов',
                'Попов',
            ]
        ],
        [
            [
                'Анна',
                'Ксения',
                'Полина',
                'Вера',
                'Анастасия',
                'Евгения',
                'Злата',
                'Кира',
                'София',
            ],
            [
                'Дмитриевна',
                'Тимофеевна',
                'Александровна',
                'Никитична',
                'Кирилловна',
                'Макаровна',
                'Максимовна',
                'Тимофеевна',
                'Ильинична',
            ],
            [
                'Александрова',
                'Андреева',
                'Бабушкина',
                'Баранова',
                'Блинова',
                'Воронова',
                'Дроздова',
                'Иванова',
                'Попова',
                'Сорокина',
            ]
        ]
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = random_int(0, 1);
        $password = $this->faker->regexify('[0-9][!@#$%^&*][a-z][A-Z][0-9a-zA-Z!@#$%^&*]{6}');
        $login = $this->faker->unique()->bothify('id-######');
        return [
            'login' => $login,
            'password' => Hash::make($password),
            'name' => $this->faker->randomElements($this->fio[$gender][0])[0],
            'middlename' => $this->faker->randomElements($this->fio[$gender][1])[0],
            'surname' => $this->faker->randomElements($this->fio[$gender][2])[0],
            'role' => $this->faker->randomElements(['student', 'teacher', 'admin'])[0],
            'group_id' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
