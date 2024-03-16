<?php

namespace app\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(SubjectStoreRequest $request){
        $created_subject=Subject::create($request->validated());
        return new SubjectResource($created_subject);

    }
}
