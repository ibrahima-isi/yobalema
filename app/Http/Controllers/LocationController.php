<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationFormRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::with('user', 'chauffeur')->get();
        return view('admin.locations.index', ['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.locations.form', [
            'location' => new Location(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationFormRequest $request)
    {
        Location::create($request -> validated());
        return view('admin.locations.index')
            ->with('succes', 'location Créé avec succés');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return view('admin.locations.show', ['location' => $location]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('admin.locations.form', ['location' => $location]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationFormRequest $request, Location $location)
    {
        $location->update($request->validated());
        return to_route('admin.location.index')
            ->with('success', 'Location mis a jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->back()-with('success', 'Location supprimée !');
    }
}
