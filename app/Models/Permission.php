<?php

namespace App\Models;

use App\Traits\CreatedUpdatedTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, CreatedUpdatedTrait;
    
    protected $fillable = ['title'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
