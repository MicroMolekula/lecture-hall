<?php

namespace app\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Subject $subject){

        return new SubjectResource($subject);


    }
}
