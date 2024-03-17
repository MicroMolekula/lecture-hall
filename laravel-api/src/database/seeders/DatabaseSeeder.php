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
        $this->addInsitute(3);//3 раза должна быть запущена
        $this->addGroups();
        $this->addUsers(10, 20, 70);

        $this->addSubjects(8);//8 раз должна быть запущена
        $this->addGroupSubject(50);// не менее 30 раз должна быть запущена
        $this->addSubjectUser(50);//не менее 20 раз

        User::factory(1)->state([
            'login' => 'id-123456',
            'password' => Hash::make('123456'),
        ])->create();



        $this->addFiles();
    }

    private function addGroups()
    {
        $groups = [
            ["group" => 'ПИ-21-1', "institute_id" => 1],
            ["group" => 'АС-21-1', "institute_id" => 2],
            ["group" => 'АИ-21-1', "institute_id" => 3],
            ["group" => 'ЭО-21-2', "institute_id" => 1],
            ["group" => 'ПМ-20-1', "institute_id" => 2],
            ["group" => 'AC-20-2', "institute_id" => 3],
            ["group" => 'ПИ-22-1', "institute_id" => 1],
            ["group" => 'ПИ-20-1', "institute_id" => 2],
            ["group" => 'ЭО-20-1', "institute_id" => 3],
        ];
        foreach ($groups as $group) {
            Group::create([
                'title' => $group['group'],
                'institute_id' => $group['institute_id']
            ]);
        }
        //Group::factory($count)->create();
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
            fn(Sequence $sequence) => [
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
