<?php

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|----------------------------   ----------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/{user}/show', [\App\Http\Controllers\UserController::class, 'show']);
Route::post('/login', \App\Http\Controllers\LoginController::class);
Route::get('/test', \App\Http\Controllers\TestAudioController::class);
Route::get('/users/test', [\App\Http\Controllers\UserController::class, 'test']);

Route::get('/teachers', function () {
    $teachers = User::where('role', 'teacher')->get();
    return \App\Http\Resources\UserResource::collection($teachers);
});



Route::get('/subject', \App\Http\Controllers\Subject\IndexController::class)->name('subject.index');
Route::post('/subject', \App\Http\Controllers\Subject\StoreController::class)->name('subject.store');
Route::get('/subject/{subject}', \App\Http\Controllers\Subject\ShowController::class)->name('subject.show');
Route::post('/subject/{subject}/fileUpload', \App\Http\Controllers\Subject\FileUploadController::class)->name('subject.edit');
Route::patch('/subject/{subject}', \App\Http\Controllers\Subject\UpdateController::class)->name('subject.update');
Route::delete('/subject/{subject}', \App\Http\Controllers\Subject\DestroyController::class)->name('subject.delete');

Route::get('/file/{file}', \App\Http\Controllers\File\WhisperController::class);


//Route::apiResources([
//   'files' => \App\Http\Controllers\Api\FileController::class
//]);



Route::get('/institute', \App\Http\Controllers\Institute\IndexController::class)->name('institute.index');
Route::post('/institute', \App\Http\Controllers\Institute\StoreController::class)->name('institute.store');
Route::get('/institute/{institute}', \App\Http\Controllers\Institute\ShowController::class)->name('institute.show');
Route::get('/institute/{institute}/edit', \App\Http\Controllers\Institute\EditController::class)->name('institute.edit');
Route::patch('/institute/{institute}', \App\Http\Controllers\Institute\UpdateController::class)->name('institute.update');
Route::delete('/institute/{institute}',\App\Http\Controllers\Institute\DestroyController::class   )->name('institute.delete');


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('user_or_fail', function (){
        try{
            $user = auth()->userOrFail();
            return new \App\Http\Resources\UserResource($user);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    });
});



Route::get('/group', \App\Http\Controllers\Group\IndexController::class)->name('group.index');
Route::post('/group', \App\Http\Controllers\Group\StoreController::class)->name('group.store');
Route::get('/group/{group}', \App\Http\Controllers\Group\ShowController::class)->name('group.show');
Route::get('/group/{group}/edit', \App\Http\Controllers\Group\EditController::class)->name('group.edit');
Route::patch('/group/{group}', \App\Http\Controllers\Group\UpdateController::class)->name('group.update');
Route::delete('/group/{group}',\App\Http\Controllers\Group\DestroyController::class   )->name('group.delete');

Route::post('/file', \App\Http\Controllers\File\StoreController::class);
Route::post('/file', \App\Http\Controllers\File\IndexController::class);





