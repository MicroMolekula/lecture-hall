<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Subject'], function(){
    Route::get('/subject', 'IndexController')->name('subject.index');
    Route::get('/subject/create', 'CreateController')->name('subject.create');
    Route::post('/subject', 'StoreController')->name('subject.store');
    Route::get('/subject/{subject}', 'ShowController')->name('subject.show');
    Route::get('/subject/{subject}/edit', 'EditController')->name('subject.edit');
    Route::patch('/subject/{subject}', 'UpdateController')->name('subject.update');
    Route::delete('/subject/{subject}', 'DestroyController')->name('subject.delete');
});
