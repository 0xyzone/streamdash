<?php

namespace App\Http\Controllers;

use App\Events\FetchDetails;
use App\Http\Requests\TourneyRequest;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournaments = Tournament::paginate(10);
        return view('tournaments.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourneyRequest $request)
    {
        $formFields = $request->validated();
        $formFields['end_date'] = $request['ending'];
        dd($formFields);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }


        Tournament::create($formFields);

        return redirect(route('tournaments.index'))->with('success', 'Tournament created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        return view('tournaments.edit', compact('tournament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TourneyRequest $request, Tournament $tournament)
    {
        $formFields = $request->validated();
        $formFields['end_date'] = $request['ending'];
        $updated = $tournament->update($formFields);
        $event = event(new FetchDetails($tournament));
        return back()->with('success', 'Tournament updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
