<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Information extends JsonResource
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
            'name'                  => $this->name,
            'gender'                => $this->gender,
            'phone'                 => $this->phone,
            'email'                 => $this->email,
            'address'               => $this->address,
            'nationality'           => $this->nationality,
            'dob'                   => $this->dob,
            'education_background'  => $this->education_background,
            'contact_via'           => $this->contact_via
        ];
    }
}
