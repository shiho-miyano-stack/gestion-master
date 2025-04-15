<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secteur;

class SecteurController extends Controller
{
    public function index()
    {
        $secteurs = Secteur::all();
        return view('secteur.index', compact('secteurs'));
    }

    // Afficher le formulaire de création d'un secteur
    public function create()
    {
        return view('secteur.create');
    }

    // Enregistrer un nouveau secteur
    public function store(Request $request)
    {
        $request->validate([
            'Libelle' => 'required|string|max:100',
        ]);

        Secteur::create([
            'Libelle' => $request->Libelle,
        ]);

        return redirect()->route('secteurs.index')->with('success', 'Secteur ajouté avec succès.');
    }

    
    public function show($id)
    {
        $secteur = Secteur::findOrFail($id);
        return view('secteur.show', compact('secteur'));
    }

    
    public function edit($id)
    {
        $secteur = Secteur::findOrFail($id);
        return view('secteur.edit', compact('secteur'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'Libelle' => 'required|string|max:100',
        ]);

        $secteur = Secteur::findOrFail($id);
        $secteur->update([
            'Libelle' => $request->Libelle,
        ]);

        return redirect()->route('secteurs.index')->with('success', 'Secteur mis à jour avec succès.');
    }

    // Supprimer un secteur
    public function destroy($id)
    {
        $secteur = Secteur::findOrFail($id);
        $secteur->delete();

        return redirect()->route('secteurs.index')->with('success', 'Secteur supprimé avec succès.');
    }
    
}
