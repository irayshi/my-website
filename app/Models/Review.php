<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;

    protected $fillable = ['client_id', 'project_id', 'token', 'rating', 'message', 'submitted_at'];

    protected function casts(): array
    {
        return ['submitted_at' => 'datetime'];
    }

    public function client(): BelongsTo { return $this->belongsTo(Client::class); }
    public function project(): BelongsTo { return $this->belongsTo(Project::class); }
}
