<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'test_audio',
            'path' => 'public/audio/test_audio.mp3',
            'type' => 'audio',
            'user_id' => User::find(1)->id,
            'subject_id' => Subject::find(1)->id,
        ];
    }
}
