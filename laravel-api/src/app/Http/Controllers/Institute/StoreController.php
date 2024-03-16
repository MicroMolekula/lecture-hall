<?php

namespace app\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstituteStoreRequest;
use App\Http\Resources\InstituteResource;
use App\Models\Institute;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(InstituteStoreRequest $request){
        $data = $request->validated();
        $institute=Institute::create($data);
        $institute->groups()->attach($data['groups']);
        return new InstituteResource($institute);

    }
}
