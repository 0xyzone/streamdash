<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    public function start(Tournament $tournament) {

        return view('screens.starting', compact('tournament'));
    }

    public function caster(Tournament $tournament) {

        return view('screens.caster', compact('tournament'));
    }
}
