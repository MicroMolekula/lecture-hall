<?php

namespace app\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Subject $subject){
        $subject->delete();
        return response(null,Responce::HTTP_NO_CONTENT);
    }
}
