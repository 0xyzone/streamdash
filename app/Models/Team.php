<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Sushi\Sushi;

class Team extends Model
{
    use Sushi;
    /**
     * Model Rows
     *
     * @return void
     */
    public function getRows()
    {
        //API
        $teams = Http::get('http://members.nepalesports.org/api/v1/teams')->json();

        return $teams;
    }
    // use HasFactory;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'personal_team',
    //     'short_name',
    //     'game_id',
    //     'team_id_number',
    //     'team_logo_path',
    // ];

    // /**
    //  * The accessors to append to the model's array form.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $appends = [
    //     'team_logo_url',
    // ];

    // /**
    //  * Get the URL for the team logo.
    //  *
    //  * @return string|null
    //  */
    // public function getTeamLogoUrlAttribute()
    // {
    //     // Assuming you have a method to generate the URL for the team logo path
    //     if ($this->team_logo_path) {
    //         return asset($this->team_logo_path); // Assuming the logo path is a URL or relative path
    //     }

    //     return null;
    // }

    // /**
    //  * The event map for the model.
    //  *
    //  * @var array<string, class-string>
    //  */
    // protected $dispatchesEvents = [
    //     'created' => TeamCreated::class,
    //     'updated' => TeamUpdated::class,
    //     'deleted' => TeamDeleted::class,
    // ];

    // public function game()
    // {
    //     return $this->belongsTo(Game::class);
    // }
}
