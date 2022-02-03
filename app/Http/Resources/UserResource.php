<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'avatar' => $this->profile_photo_url,
            'threads' => $this->thread->where('status', 'open')
        ];
    }
}
