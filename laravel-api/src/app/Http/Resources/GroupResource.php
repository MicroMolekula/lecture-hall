<?php

namespace app\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'institute_id' => $this->institute_id,
            'users'=>$this->users,
            'subjects'=>$this->subjects,
            'institute'=>$this->institute,
        ];
    }
}
