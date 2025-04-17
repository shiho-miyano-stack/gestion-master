<?php

namespace App\Http\Controllers;

use App\Models\Cooperative;
use App\Models\Commune;
use App\Models\Categorie;
use App\Models\Secteur;
use Illuminate\Http\Request;

class CooperativeController extends Controller
{
    public function index()
    {
        $cooperatives = Cooperative::with(['commune', 'categorie', 'secteur'])->get();
        return view('cooperative.index', compact('cooperatives'));
    }

    public function create()
    {
        $communes = Commune::all();
        $categories = Categorie::all();
        $secteurs = Secteur::all();
        return view('cooperative.create', compact('communes', 'categories', 'secteurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NumCop' => 'nullable|integer',
            'NomFr' => 'required|string|max:500',
            'NomAr' => 'required|string|max:500',
            'Num_Ordre' => 'nullable|integer',
            'Date_Enre' => 'nullable|date',
            'Telephonne' => 'nullable|string|max:50',
            'NumInscrip' => 'nullable|string|max:500',
            'DateCreation' => 'nullable|date',
            'NumAnalytique' => 'nullable|string|max:500',
            'NbrMem' => 'required|integer',
            'NbrColl' => 'nullable|integer',
            'Secteur' => 'nullable|exists:secteur,Id',
            'Categorie' => 'nullable|exists:categorie,Id',
            'Adresse' => 'nullable|string|max:500',
            'Informations' => 'nullable|string|max:1000',
            'IdComm' => 'required|exists:commune,Id',
            'DejaBeneficie' => 'nullable|string|max:5',
            'Nbr_Benifiement' => 'nullable|integer',
        ]);

        Cooperative::create($request->all());

        return redirect()->route('cooperatives.index')->with('success', 'Coopérative ajoutée avec succès.');
    }

    public function show(Cooperative $cooperative)
    {
        return view('cooperative.show', compact('cooperative'));
    }

    public function edit(Cooperative $cooperative)
    {
        $communes = Commune::all();
        $categories = Categorie::all();
        $secteurs = Secteur::all();
        return view('cooperative.edit', compact('cooperative', 'communes', 'categories', 'secteurs'));
    }

    public function update(Request $request, Cooperative $cooperative)
    {
        $request->validate([
            'NumCop' => 'nullable|integer',
            'NomFr' => 'required|string|max:500',
            'NomAr' => 'required|string|max:500',
            'Num_Ordre' => 'nullable|integer',
            'Date_Enre' => 'nullable|date',
            'Telephonne' => 'nullable|string|max:50',
            'NumInscrip' => 'nullable|string|max:500',
            'DateCreation' => 'nullable|date',
            'NumAnalytique' => 'nullable|string|max:500',
            'NbrMem' => 'required|integer',
            'NbrColl' => 'nullable|integer',
            'Secteur' => 'nullable|exists:secteur,Id',
            'Categorie' => 'nullable|exists:categorie,Id',
            'Adresse' => 'nullable|string|max:500',
            'Informations' => 'nullable|string|max:1000',
            'IdComm' => 'required|exists:commune,Id',
            'DejaBeneficie' => 'nullable|string|max:5',
            'Nbr_Benifiement' => 'nullable|integer',
        ]);

        $cooperative->update($request->all());

        return redirect()->route('cooperatives.index')->with('success', 'Coopérative modifiée avec succès.');
    }

    public function destroy(Cooperative $cooperative)
    {
        $cooperative->delete();
        return redirect()->route('cooperatives.index')->with('success', 'Coopérative supprimée avec succès.');
    }
}
