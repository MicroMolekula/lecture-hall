<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;

class IndexController extends Controller
{
    public function __invoke()
    {
        return SubjectResource::collection(Subject::all());
    }
}
