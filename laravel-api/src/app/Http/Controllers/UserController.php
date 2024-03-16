<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectResource;
use App\Http\Resources\UserResource;
use App\Models\Group;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        $group = $user->group;
        $subjects = $group->subjects;
        return SubjectResource::collection($subjects);
    }

    public function test()
    {
        $user = User::all()->random(1)->firstOrFail();
        return [
            'login' => $user->login,
            'password' => $user->password,
        ];
    }
}
