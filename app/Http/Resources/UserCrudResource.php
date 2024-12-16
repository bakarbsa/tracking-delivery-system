<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCrudResource extends JsonResource
{
    public static $wrap = false;

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
            "email" => $this->email,
            "location_id" => $this->location_id,
            "location" => new LocationResource($this->location),
            "role_id" => $this->role_id,
            "role" => new RoleResource($this->role),
            "username" => $this->username,
            "created_at" => (new Carbon($this->created_at))->format("Y-m-d H:i:s"),
            "updated_at" => (new Carbon($this->updated_at))->format("Y-m-d H:i:s"),
        ];
    }
}
