<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'slug',
            'game_logo_path',
        ];

    protected $appends =
        [
            'game_logo_url'
        ];

    public function getGameLogoUrlAttribute()
    {
        return $this->game_logo_path ? url('storage/' . $this->game_logo_path) : null;
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
