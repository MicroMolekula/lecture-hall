<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\File;
use App\Models\Group;
use App\Models\GroupSubject;
use App\Models\Institute;
use App\Models\Subject;
use App\Models\SubjectUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->addInsitute(7);
        $this->addGroups(10);
        $this->addUsers(10, 20, 70);
        User::factory(1)->state([
            'login' => 'id-123456',
            'password' => Hash::make('123456'),
        ])->create();
        $this->addSubjects(40);
        $this->addGroupSubject(50);
        $this->addSubjectUser(50);
        $this->addFiles();
    }

    private function addGroups($count)
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
        Group::factory($count)->create();
    }

    private function addUsers($countAdmin, $countTeacher, $countStudent)
    {
        User::factory($countAdmin)->state(
            ['role' => 'admin',]
        )->create();
        User::factory($countTeacher)->state(
            ['role' => 'teacher',]
        )->create();
        User::factory($countStudent)->state(new Sequence(
            fn (Sequence $sequence) => [
                'role' => 'student',
                'group_id' => Group::all()->random(1)[0]->id
            ],
        ))->create();
    }

    private function addSubjects($count)
    {
        Subject::factory($count)->create();
    }

    private function addGroupSubject($count)
    {
        GroupSubject::factory($count)->create();
    }

    private function addInsitute($count)
    {
        Institute::factory($count)->create();
    }

    private function addFiles()
    {
        File::factory(1)->create();
    }

    private function addSubjectUser($count)
    {
        SubjectUser::factory($count)->create();
    }
}
