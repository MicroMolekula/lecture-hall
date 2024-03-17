<?php

namespace app\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(GroupStoreRequest $request, Group $group){
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $subjects = $data['subjects'];
            $users = $data['users'];
            unset($data['users']);
            $group->update($data);

            foreach ($users as $user) {
                User::find($user)->update([
                    'group_id' => $group->id
                ]);
            }
            $group->subjects()->sync($subjects);
            DB::commit();
        }catch (\Exception $exception){
            DB:rollback();
            return response()->json(['message' => $exception->getMessage()]);
        }

        return new GroupResource($group);
    }


    //public function __invoke(GroupStoreRequest $request,Group $group){
    //    $group->update($request->validated());
    //    return new GroupResource($group);
    //}
}
