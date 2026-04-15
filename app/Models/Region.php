<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Guarded([])]
class Region extends Model
{
    protected $casts = [
        'status' => 'string',
    ];

    // Scope untuk region active saja
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    // Scope untuk filter by regionid
    public function scopeByRegionId(Builder $query, string $regionId): Builder
    {
        return $query->where('regionid', $regionId);
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'region_id');
    }

    public function candidates(): HasMany
    {
        return $this->hasMany(Candidate::class, 'region_id');
    }
}