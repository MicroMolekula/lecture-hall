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

