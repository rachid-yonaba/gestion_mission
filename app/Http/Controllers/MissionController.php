<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Personnel;
use App\Models\Client;
use App\Models\Consultant;
use App\Models\Typedemission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::with(['personnel','client','consultant','typedemission'])->get();
        return view('missions.index', compact('missions'));
    }

    public function create()
    {
        $personnels = Personnel::all();
        $clients = Client::all();
        $consultants = Consultant::all();
        $typedemissions = Typedemission::all();

        return view('missions.create', compact('personnels','clients','consultants','typedemissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:missions',
            'libelle' => 'required',
            'datedebut' => 'required|date',
            'datefin' => 'required|date|after_or_equal:datedebut',
        ]);

        Mission::create($request->all());
        return redirect()->route('missions.index')->with('success','Mission créée avec succès !');
    }

    public function show(Mission $mission)
    {
        return view('missions.show', compact('mission'));
    }

    public function edit(Mission $mission)
    {
        $personnels = Personnel::all();
        $clients = Client::all();
        $consultants = Consultant::all();
        $typedemissions = Typedemission::all();

        return view('missions.edit', compact('mission','personnels','clients','consultants','typedemissions'));
    }

    public function update(Request $request, Mission $mission)
    {
        $validated = $request->validate([
            'libelle' => 'required',
            'datedebut' => 'required|date',
            'datefin' => 'required|date|after_or_equal:datedebut',
        ]);

        $mission->update($request->all());
        return redirect()->route('missions.index')->with('success','Mission mise à jour !');
    }

    public function destroy(Mission $mission)
    {
        $mission->delete();
        return redirect()->route('missions.index')->with('success','Mission supprimée !');
    }
}
