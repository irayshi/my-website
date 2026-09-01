<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name'];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
