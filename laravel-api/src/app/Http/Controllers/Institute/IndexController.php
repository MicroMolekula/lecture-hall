<?php

namespace app\Http\Controllers\Institute;

use App\Http\Controllers\Controller;


use App\Http\Resources\InstituteResource;
use App\Models\Institute;

class IndexController extends Controller
{
    public function __invoke(){
        $institutes=Institute::all();
        return InstituteResource::collection($institutes);
    }
}
