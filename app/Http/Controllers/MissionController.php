<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Typedemission;
use App\Models\Personnel;
use App\Models\Client;
use App\Models\Consultant;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Afficher la liste des missions.
     */
    public function index()
    {
        $missions = Mission::all();
        return view('missions.index', compact('missions'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        $chefs = Personnel::all();
        $types = Typedemission::all();
        $clients = Client::all();
        $consultants = Consultant::all();

        return view('missions.create', compact('chefs', 'types', 'clients', 'consultants'));
    }

    /**
     * Stocker une nouvelle mission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Description' => 'required|string',
            'type' => 'required|exists:typedemissions,type',
            'chef' => 'required|exists:personnels,id',
            'budget' => 'nullable|numeric',
            'datedebut' => 'nullable|date',
            'datefin' => 'nullable|date|after_or_equal:datedebut',
            'commentaire' => 'nullable|string',
            'NomResponsable' => 'nullable|string',
            'FontionResponsable' => 'nullable|string',
            'NomClient' => 'required|exists:clients,NomResponsable',
            'NomConsultant' => 'required|exists:consultants,nom',
            'Nbreemployé' => 'nullable|integer',
            'Adresse' => 'nullable|string',
            'téléphone' => 'nullable|string',
            'resultat' => 'nullable|string',
            'Nbremois' => 'nullable|integer',
            'Libell' => 'nullable|string',
        ]);

        Mission::create($request->all());

        return redirect()->route('missions.index')->with('success', 'Mission ajoutée avec succès.');
    }

    /**
     * Afficher le formulaire d'édition.
     */
  public function edit($id)
{
    $mission = Mission::findOrFail($id);

    // Récupérer les données pour les selects
    $types = Typedemission::all();
    $chefs = Personnel::all();
    $clients = Client::all();
    $consultants = Consultant::all();

    return view('missions.edit', compact('mission', 'types', 'chefs', 'clients', 'consultants'));
}



    /**
     * Mettre à jour la mission.
     */
    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'Description' => 'required|string',
            'type' => 'required|exists:typedemissions,type',
            'chef' => 'required|exists:personnels,id',
            'budget' => 'nullable|numeric',
            'datedebut' => 'nullable|date',
            'datefin' => 'nullable|date|after_or_equal:datedebut',
            'commentaire' => 'nullable|string',
            'NomResponsable' => 'nullable|string',
            'FontionResponsable' => 'nullable|string',
            'NomClient' => 'required|exists:clients,NomResponsable', 
            'NomConsultant' => 'required|exists:consultants,nom',
            'Nbreemployé' => 'nullable|integer',
            'Adresse' => 'nullable|string',
            'téléphone' => 'nullable|string',
            'resultat' => 'nullable|string',
            'Nbremois' => 'nullable|integer',
            'Libell' => 'nullable|string',
        ]);

        $mission->update($request->all());

        return redirect()->route('missions.index')->with('success', 'Mission mise à jour avec succès.');
    }
// détails des missions
public function show(Mission $mission)
{
    return view('missions.show', compact('mission'));
}
    /**
     * Supprimer la mission.
     */
    public function destroy(Mission $mission)
    {
        $mission->delete();

        return redirect()->route('missions.index')->with('success', 'Mission supprimée avec succès.');
    }
}
