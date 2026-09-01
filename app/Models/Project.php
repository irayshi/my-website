<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'client_id', 'name', 'description', 'tech_stack', 'link_demo',
        'is_internal', 'is_visible', 'started_at', 'finished_at', 'canceled_at',
    ];

    protected function casts(): array
    {
        return [
            'is_internal' => 'boolean',
            'is_visible' => 'boolean',
            'created_at' => 'datetime',
            'started_at' => 'datetime',
            'finished_at' => 'datetime',
            'canceled_at' => 'datetime',
        ];
    }

    public function client(): BelongsTo { return $this->belongsTo(Client::class); }
    public function reviews(): HasMany { return $this->hasMany(Review::class); }
    public function images(): MorphMany { return $this->morphMany(Image::class, 'imageable'); }
}
