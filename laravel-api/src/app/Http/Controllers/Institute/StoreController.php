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
        $created_institute=Institute::create($request->validated());
        return new InstituteResource($created_institute);

    }
}
