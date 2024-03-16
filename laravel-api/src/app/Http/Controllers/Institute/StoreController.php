<?php

namespace app\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstituteStoreRequest;
use App\Http\Resources\InstituteResource;
use App\Models\Group;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(InstituteStoreRequest $request){
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $groups = $data['groups'];
            unset($data['groups']);
            $institute = Institute::create($data);

            foreach ($groups as $group) {
                Group::find($group)->update([
                    'institute_id' => $institute->id,
                ]);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()]);
        }

        return new InstituteResource($institute);
    }
}
