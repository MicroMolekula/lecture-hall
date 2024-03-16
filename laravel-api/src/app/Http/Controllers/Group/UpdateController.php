<?php

namespace app\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(GroupStoreRequest $request,Group $group){
        $group->update($request->validated());

        return new GroupResource($group);

    }
}
