<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;


class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categorie.index', compact('categories'));
    }

    public function create()
    {
        return view('categorie.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'Libelle' => 'required|string|max:255',
        ]);
    
        Categorie::create([
            'Libelle' => $request->Libelle,
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }
    

    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categorie.show', compact('categorie'));
    }

    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categorie.edit', compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Libelle' => 'required|string|max:255',
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update([
            'Libelle' => $request->Libelle
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès!');
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès!');
    }
}