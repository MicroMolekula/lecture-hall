<?php

namespace app\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Subject $subject){
        return SubjectResource::collection($subject);
    }
}
