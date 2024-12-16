<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "location_id" => $this->location_id,
            "location" => new LocationResource($this->location),
            "role_id" => $this->role_id,
            "role" => new RoleResource($this->role),
            "username" => $this->username,
            "email" => $this->email
        ];
    }
}
