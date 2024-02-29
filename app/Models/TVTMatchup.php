<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVTMatchup extends Model
{
    use HasFactory;

    protected $fillable = [
        'a_team_id',
        'b_team_id',
    ];
}
