<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginResource;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
           'login' => 'string',
           'password' => 'string',
        ]);
        try {
            $user = User::where('login', $data['login'])->get()->firstOrFail();
            try{
                return $user->password == $data['password'] ?
                    new LoginResource($user) :
                    throw new Exception('Wrong password.');
            } catch (Exception $exception){
                return response()->json(['message' => $exception->getMessage()], 403);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => 'User is not exists'], 403);
        }
    }
}
