<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->addGroups();
        $this->addUsers();
    }

    private function addGroups()
    {
//        $groups = [
//            'ПИ-21-1',
//            'АС-21-1',
//            'АИ-21-1',
//            'АИ-21-2',
//            'АС-21-2',
//            'С-AC-20-1',
//        ];
//        foreach ($groups as $group){
//            Group::create([
//                'title' => $group,
//            ]);
//        }
        Group::factory(10)->create();
    }

    private function addUsers()
    {
        User::factory(10)->state(
            ['role' => 'admin',]
        )->create();
        User::factory(20)->state(
            ['role' => 'teacher',]
        )->create();
        User::factory(70)->state(new Sequence(
            fn (Sequence $sequence) => [
                'role' => 'student',
                'group_id' => Group::all()->random(1)[0]->id
            ],
        ))->create();
    }

    private function addSubjects()
    {

    }
}
