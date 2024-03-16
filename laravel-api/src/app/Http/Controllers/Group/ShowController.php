<?php

namespace app\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Group $group){
        return new GroupResource($group);
    }
}
