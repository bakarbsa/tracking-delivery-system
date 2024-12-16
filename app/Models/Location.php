<?php

namespace App\Models;

use App\Traits\CreatedUpdatedTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory, CreatedUpdatedTrait;
    
    protected $fillable = ['name', 'type'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
