<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request){
        // Валидация данных из формы
        $request->validate([
            'title' => 'required|string|max:255',

            // Другие правила валидации, если нужно
        ]);
        dd($request);
        // Создание нового объекта модели Subject и заполнение его данными из формы
        $subject = new Subject();
        $subject->title = $request->input('title');

        // Другие поля, если есть

        // Сохранение объекта в базу данных
        $subject->save();

        // Редирект на страницу, отображающую добавленный элемент, или на другую страницу
        return new SubjectResource($subject);
    }
}
