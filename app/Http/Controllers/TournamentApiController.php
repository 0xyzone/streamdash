<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentApiController extends Controller
{
    public function details(Tournament $tournament) {
        return response()->json($tournament->where('id', $tournament->id)->get());
    }
}
