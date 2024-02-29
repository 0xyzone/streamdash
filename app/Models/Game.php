<?php

namespace App\Models;

use Sushi\Sushi;
use App\Models\Team;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use Sushi;
    use HasFactory;

    /**
     * Model Rows
     *
     * @return void
     */
    public function getRows()
    {
        //API
        $games = Http::get('http://members.nepalesports.org/api/v1/games')->json();

        return $games;
    }

    // protected $fillable =
    //     [
    //         'name',
    //         'slug',
    //         'game_logo_path',
    //     ];

    // protected $appends =
    //     [
    //         'game_logo_url'
    //     ];

    // public function getGameLogoUrlAttribute()
    // {
    //     return $this->game_logo_path ? url('storage/' . $this->game_logo_path) : null;
    // }

    // public function teams()
    // {
    //     return $this->hasMany(Team::class);
    // }
}
