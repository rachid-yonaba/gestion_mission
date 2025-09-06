<?php

namespace App\Http\Controllers;

use App\Models\Typedemission;
use Illuminate\Http\Request;

class TypedemissionController extends Controller
{
    public function index()
    {
        $types = Typedemission::all();
        return view('type_de_missions.index', compact('types'));
    }

    public function create()
    {
        return view('type_de_missions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Externe,Interne|unique:type_de_missions,type',
        ]);

        Typedemission::create($request->all());
        return redirect()->route('type_de_missions.index')->with('success', 'Type de mission ajouté.');
    }

    public function edit(Typedemission $type_de_mission)
    {
        return view('type_de_missions.edit', compact('type_de_mission'));
    }

    public function update(Request $request, Typedemission $type_de_mission)
    {
        $request->validate([
            'type' => 'required|in:Externe,Interne|unique:type_de_missions,type,' . $type_de_mission->id,
        ]);

        $type_de_mission->update($request->all());
        return redirect()->route('type_de_missions.index')->with('success', 'Type de mission mis à jour.');
    }

    public function destroy(Typedemission $type_de_mission)
    {
        $type_de_mission->delete();
        return redirect()->route('type_de_missions.index')->with('success', 'Type de mission supprimé.');
    }
}
