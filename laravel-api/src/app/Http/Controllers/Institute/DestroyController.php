<?php

namespace app\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\Institute;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DestroyController extends Controller
{
    public function __invoke(Institute $institute){
        $institute->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
