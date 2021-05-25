<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ResidentialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'photo' => url($this->photo),
            'state' => $this->active,
            'phone' => $this->phone,
            'address' => $this->address,
            'slider' => $this->slider,
            'creator' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'role' => $this->user->role,
                'estate' => $this->user->active,
            ],
            'city' => $this->city,
            'created_at' => $this->created_at,
        ];
    }
}
