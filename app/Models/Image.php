<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    public $timestamps = false;

    protected $fillable = ['image_path', 'sort_order'];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
