<?php

namespace app\Http\Controllers\Group;

use App\Http\Controllers\Controller;


use App\Http\Resources\GroupResource;
use App\Models\Group;

class IndexController extends Controller
{
    public function __invoke(){
        $groups=Group::all();
        return GroupResource::collection($groups);
    }
}
