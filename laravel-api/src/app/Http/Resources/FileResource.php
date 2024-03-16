<?php

namespace App\Http\Resources;





use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class FileResource extends JsonResource
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
            'type' => $this->type,
            'user_id' => $this->user_id,
            'subject_id' => $this->subject_id,
            'user' => new UserResource($this->user),
        ];
    }
}
