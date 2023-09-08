<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function FetchDetails(Tournament $tournament) {

        $output = '<div class="w-5 h-full" style="background-color: ' . $tournament->color . ';">
        </div>
        <h1 class="font-bold text-6xl text-white px-10" id="update">' . $tournament->name . ' </h1> ';

        return $output;
    }
}
