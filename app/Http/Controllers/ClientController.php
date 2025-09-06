<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.clients', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NomResponsable' => 'required',
            'FonctionResponsable' => 'required',
            'Structure' => 'required',
            'datedebut' => 'required|date',
            'datefin' => 'required|date|after_or_equal:datedebut',
            'InfoFinancière' => 'nullable|file|mimes:pdf,doc,docx',
            'RéférenceContrat' => 'nullable|file|mimes:pdf,doc,docx',
            'ManifestationIntéret' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $data = $request->all();

        if ($request->hasFile('InfoFinancière')) {
            $data['InfoFinancière'] = $request->file('InfoFinancière')->store('clients', 'public');
        }
        if ($request->hasFile('RéférenceContrat')) {
            $data['RéférenceContrat'] = $request->file('RéférenceContrat')->store('clients', 'public');
        }
        if ($request->hasFile('ManifestationIntéret')) {
            $data['ManifestationIntéret'] = $request->file('ManifestationIntéret')->store('clients', 'public');
        }

        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'NomResponsable' => 'required',
            'FonctionResponsable' => 'required',
            'Structure' => 'required',
            'datedebut' => 'required|date',
            'datefin' => 'required|date|after_or_equal:datedebut',
            'InfoFinancière' => 'nullable|file|mimes:pdf,doc,docx',
            'RéférenceContrat' => 'nullable|file|mimes:pdf,doc,docx',
            'ManifestationIntéret' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $data = $request->all();

        if ($request->hasFile('InfoFinancière')) {
            if ($client->InfoFinancière) Storage::disk('public')->delete($client->InfoFinancière);
            $data['InfoFinancière'] = $request->file('InfoFinancière')->store('clients', 'public');
        }

        if ($request->hasFile('RéférenceContrat')) {
            if ($client->RéférenceContrat) Storage::disk('public')->delete($client->RéférenceContrat);
            $data['RéférenceContrat'] = $request->file('RéférenceContrat')->store('clients', 'public');
        }

        if ($request->hasFile('ManifestationIntéret')) {
            if ($client->ManifestationIntéret) Storage::disk('public')->delete($client->ManifestationIntéret);
            $data['ManifestationIntéret'] = $request->file('ManifestationIntéret')->store('clients', 'public');
        }

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

public function show(Client $client)
{
    return view('clients.show', compact('client'));
}


    public function destroy(Client $client)
    {
        if ($client->InfoFinancière) Storage::disk('public')->delete($client->InfoFinancière);
        if ($client->RéférenceContrat) Storage::disk('public')->delete($client->RéférenceContrat);
        if ($client->ManifestationIntéret) Storage::disk('public')->delete($client->ManifestationIntéret);

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
