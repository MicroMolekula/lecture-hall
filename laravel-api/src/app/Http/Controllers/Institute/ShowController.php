<?php

namespace app\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstituteResource;
use App\Models\Institute;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Institute $institute){

        return new InstituteResource($institute);


    }
}
