<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartamentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'number' => $this->number,
            'description' => $this->description,
            'slider' => $this->slider,
            'price' => $this->price,
            'active' => $this->active,
            'photo' => url($this->photo),
            'creator' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'role' => $this->user->role,
                'estate' => $this->user->active,
            ],
            'residential' => [
                'residential_name' => $this->residential->name,
                'photo' => url($this->residential->photo),
                'address' => $this->residential->address,
                'phone' => $this->residential->phone,
                'city' => $this->residential->city,
            ],
            'created_at' => $this->created_at
        ];
    }
}
