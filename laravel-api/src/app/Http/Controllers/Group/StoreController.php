<?php

namespace app\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupStoreRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(GroupStoreRequest $request){
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $subjects = $data['subjects'];
            $users = $data['users'];
            unset($data['users']);
            $group = Group::create($data);

            foreach ($users as $user) {
                User::find($user)->update([
                    'group_id' => $group->id
                ]);
            }
            $group->subjects()->attach($subjects);
            DB::commit();
        }catch (\Exception $exception){
            DB:rollback();
            return response()->json(['message' => $exception->getMessage()]);
        }

        return new GroupResource($group);
    }

    //public function __invoke(GroupStoreRequest $request){
    //     $created_group=Group::create($request->validated());
    //    return new GroupResource($created_group);
    //}
}
