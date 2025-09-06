<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function personnel()
    {
        $personnels = Personnel::all();
        return view('personnels.personnels', compact('personnels'));
    }

    public function create()
    {
        return view('personnels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'service' => 'required',
            'fonction' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:personnels,email'
        ]);

        Personnel::create($request->all());
        return redirect()->route('personnels')->with('success', 'Personnel ajouté avec succès.');
    }

    public function edit(Personnel $personnel)
    {
        return view('personnels.edit', compact('personnel'));
    }

    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'service' => 'required',
            'fonction' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:personnels,email,' . $personnel->id
        ]);

        $personnel->update($request->all());
        return redirect()->route('personnels')->with('success', 'Personnel mis à jour avec succès.');
    }

    public function destroy(Personnel $personnel)
    {
        $personnel->delete();
        return redirect()->route('personnels')->with('success', 'Personnel supprimé avec succès.');
    }
}

