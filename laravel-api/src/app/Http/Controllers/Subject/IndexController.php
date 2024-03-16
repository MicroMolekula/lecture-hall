<?php

namespace app\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use app\Http\Controllers\Subject\SubjectResource;
use App\Models\Subject;

class IndexController extends Controller
{
    public function __invoke(){
        $subjects=Subject::all();
        return SubjectResource::collection($subjects);
    }
}
