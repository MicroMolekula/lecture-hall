<?php

namespace app\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;


use Illuminate\Http\Response;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Group $group){
        $group->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
