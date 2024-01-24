<?php

namespace App\Http\Controllers;

use App\Models\Caster;
use Illuminate\Http\Request;

class CasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casters = Caster::paginate(5);
        return view('casters.index', compact('casters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('casters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Caster $caster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caster $caster)
    {
        return view('casters.edit', compact('caster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caster $caster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caster $caster)
    {
        //
    }
}
