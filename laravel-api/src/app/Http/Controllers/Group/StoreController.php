<?php

namespace app\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(GroupStoreRequest $request){
        $created_group=Group::create($request->validated());
        return new GroupResource($created_group);

    }
}
