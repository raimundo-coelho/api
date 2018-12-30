<?php

namespace IDEALE\Http\Resources\user;

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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
            'cpf' => $this->cpf,
            'other_document' => $this->other_document,
            'phone' => $this->phone,
            'address' => $this->address,
            'postcode' => $this->postcode,
            'number' => $this->number,
            'complement' => $this->complement,
            'city' => $this->city,
            'neighborhood' => $this->neighborhood,
            'uf'  => $this->uf,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
