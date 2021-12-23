<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'branch' => $this->branch,
            'department' => $this->department,
            'image' => $this->image,
            'name' => $this->name,
            'staffType' => $this->staffType,
            'status' => $this->status,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
