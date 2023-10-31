<?php

namespace App\Arrival\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Arrival\Models\Arrival;
use LibUser\UserApi\Http\Resources\UserResource;
use LibUser\Userapi\Models\User;

class ArrivalResource extends JsonResource{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'arrival' => $this->arrival,
            'dog' => $this->dog,
            'user' => new UserResource($this->user),
        ];
    }



}