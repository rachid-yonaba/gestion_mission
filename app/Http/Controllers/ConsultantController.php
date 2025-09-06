<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsultantController extends Controller
{
    public function index()
    {
        $consultants = Consultant::all();
        return view('consultants.index', compact('consultants'));
    }

    public function create()
    {
        return view('consultants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'profil' => 'required',
            'datenaissance' => 'required|date',
            'nationalité' => 'required',
            'expérience' => 'required|numeric',
            'ville' => 'required',
            'pays' => 'required',
            'téléphone' => 'required',
            'email' => 'required|email|unique:consultants,email',
            'CV' => 'nullable|file|mimes:pdf,doc,docx',
            'RéférenceContrat' => 'nullable|file|mimes:pdf,doc,docx',
            'ManifestationInt' => 'nullable|file|mimes:pdf,doc,docx',
            'dateenregistrement' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('CV')) {
            $data['CV'] = $request->file('CV')->store('consultants', 'public');
        }
        if ($request->hasFile('RéférenceContrat')) {
            $data['RéférenceContrat'] = $request->file('RéférenceContrat')->store('consultants', 'public');
        }
        if ($request->hasFile('ManifestationInt')) {
            $data['ManifestationInt'] = $request->file('ManifestationInt')->store('consultants', 'public');
        }

        Consultant::create($data);

        return redirect()->route('consultants.index')->with('success', 'Consultant ajouté avec succès.');
    }

    public function edit(Consultant $consultant)
    {
        return view('consultants.edit', compact('consultant'));
    }

    public function update(Request $request, Consultant $consultant)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'profil' => 'required',
            'datenaissance' => 'required|date',
            'nationalité' => 'required',
            'expérience' => 'required|numeric',
            'ville' => 'required',
            'pays' => 'required',
            'téléphone' => 'required',
            'email' => 'required|email|unique:consultants,email,' . $consultant->id,
            'CV' => 'nullable|file|mimes:pdf,doc,docx',
            'RéférenceContrat' => 'nullable|file|mimes:pdf,doc,docx',
            'ManifestationInt' => 'nullable|file|mimes:pdf,doc,docx',
            'dateenregistrement' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('CV')) {
            if ($consultant->CV) Storage::disk('public')->delete($consultant->CV);
            $data['CV'] = $request->file('CV')->store('consultants', 'public');
        }

        if ($request->hasFile('RéférenceContrat')) {
            if ($consultant->RéférenceContrat) Storage::disk('public')->delete($consultant->RéférenceContrat);
            $data['RéférenceContrat'] = $request->file('RéférenceContrat')->store('consultants', 'public');
        }

        if ($request->hasFile('ManifestationInt')) {
            if ($consultant->ManifestationInt) Storage::disk('public')->delete($consultant->ManifestationInt);
            $data['ManifestationInt'] = $request->file('ManifestationInt')->store('consultants', 'public');
        }

        $consultant->update($data);

        return redirect()->route('consultants.index')->with('success', 'Consultant mis à jour avec succès.');
    }

    public function destroy(Consultant $consultant)
    {
        if ($consultant->CV) Storage::disk('public')->delete($consultant->CV);
        if ($consultant->RéférenceContrat) Storage::disk('public')->delete($consultant->RéférenceContrat);
        if ($consultant->ManifestationInt) Storage::disk('public')->delete($consultant->ManifestationInt);

        $consultant->delete();

        return redirect()->route('consultants.index')->with('success', 'Consultant supprimé avec succès.');
    }

    public function show(Consultant $consultant)
    {
        return view('consultants.show', compact('consultant'));
    }
}
