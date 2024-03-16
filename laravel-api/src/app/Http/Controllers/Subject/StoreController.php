<?php

namespace app\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectStoreRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(SubjectStoreRequest $request){
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $groups = $data['groups'];
            $teachers = $data['teachers'];
            unset($data['groups'], $data['teachers']);
            $subject = Subject::create($data);

            $count = count($teachers);
            for ($i = 0; $i < $count; $i += 1){
                if (User::find($teachers[$i])->role !== 'teacher'){
                    unset($teachers[$i]);
                }
            }

            $subject->groups()->attach($groups);
            $subject->users()->attach($teachers);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()]);
        }

        return new SubjectResource($subject);
    }
}
