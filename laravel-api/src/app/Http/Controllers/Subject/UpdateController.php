<?php

namespace app\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectStoreRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(SubjectStoreRequest $request, Subject $subject){
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $groups = $data['groups'];
            $teachers = $data['teachers'];
            unset($data['groups'], $data['teachers']);
            $subject->update($data);

            $count = count($teachers);
            for ($i = 0; $i < $count; $i += 1){
                if (User::find($teachers[$i])->role !== 'teacher'){
                    unset($teachers[$i]);
                }
            }

            $subject->groups()->sync($groups);
            $subject->users()->sync($teachers);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return new SubjectResource($subject);
    }
}
