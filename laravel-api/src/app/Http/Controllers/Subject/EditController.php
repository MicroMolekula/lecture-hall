<?php

namespace app\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectStoreRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(SubjectStoreRequest $request, Subject $subject){
        $subject->update($request->validated());
        return new  SubjectResource($subject);
    }
}
