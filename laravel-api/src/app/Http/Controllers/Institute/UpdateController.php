<?php

namespace app\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstituteStoreRequest;
use App\Http\Resources\InstituteResource;
use App\Models\Institute;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(InstituteStoreRequest $request,Institute $institute){
        $institute->update($request->validated());

        return new InstituteResource($institute);

    }
}
