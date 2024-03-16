<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
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


Route::get('/subject', \App\Http\Controllers\Subject\IndexController::class)->name('subject.index');
Route::get('/subject/create', \App\Http\Controllers\Subject\CreateController::class)->name('subject.create');
Route::post('/subject', \App\Http\Controllers\Subject\StoreController::class)->name('subject.store');
Route::get('/subject/{subject}', \App\Http\Controllers\Subject\ShowController::class)->name('subject.show');
Route::get('/subject/{subject}/edit', \App\Http\Controllers\Subject\EditController::class)->name('subject.edit');
Route::patch('/subject/{subject}', \App\Http\Controllers\Subject\UpdateController::class)->name('subject.update');

Route::delete('/subject/{subject}', \App\Http\Controllers\Subject\DestroyController::class)->name('subject.delete');


////////////////////////////////

Route::apiResources([
    'files' => \App\Http\Controllers\Api\FileController::class
]);

Route::delete('/subject/{subject}',\App\Http\Controllers\Subject\DestroyController::class   )->name('subject.delete');



Route::get('/institute', \App\Http\Controllers\Institute\IndexController::class)->name('institute.index');
Route::get('/institute/create', \App\Http\Controllers\Institute\CreateController::class)->name('institute.create');
Route::post('/institute', \App\Http\Controllers\Institute\StoreController::class)->name('institute.store');
Route::get('/institute/{institute}', \App\Http\Controllers\Institute\ShowController::class)->name('institute.show');
Route::get('/institute/{institute}/edit', \App\Http\Controllers\Institute\EditController::class)->name('institute.edit');
Route::patch('/institute/{institute}', \App\Http\Controllers\Institute\UpdateController::class)->name('institute.update');
Route::delete('/institute/{institute}',\App\Http\Controllers\Institute\DestroyController::class   )->name('institute.delete');


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});



Route::get('/group', \App\Http\Controllers\Group\IndexController::class)->name('group.index');
Route::get('/group/create', \App\Http\Controllers\Group\CreateController::class)->name('group.create');
Route::post('/group', \App\Http\Controllers\Group\StoreController::class)->name('group.store');
Route::get('/group/{group}', \App\Http\Controllers\Group\ShowController::class)->name('group.show');
Route::get('/group/{group}/edit', \App\Http\Controllers\Group\EditController::class)->name('group.edit');
Route::patch('/group/{group}', \App\Http\Controllers\Group\UpdateController::class)->name('group.update');
Route::delete('/group/{group}',\App\Http\Controllers\Group\DestroyController::class   )->name('group.delete');


