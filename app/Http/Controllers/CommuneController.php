<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Province;

class CommuneController extends Controller
{
    public function index()
    {
        $communes = Commune::with('province')->get();
        return view('commune.index', compact('communes'));
    }

    public function create()
    {
        $provinces = Province::all(); // Récupérer toutes les provinces pour le select
        return view('commune.create', compact('provinces'));
    }

    public function store(Request $request)
    {     

        $request->validate([
            'Nom' => 'required|string|max:255',
            'IdProv' => 'required|exists:province,Id',
        ]);
        

        Commune::create([
            'Libelle' => $request->Nom,
            'IdProv' => $request->IdProv,
        ]);

        return redirect()->route('communes.index')->with('success', 'Commune ajoutée avec succès');
    }

    public function show($id)
    {
        $commune = Commune::with('province')->findOrFail($id);
        return view('commune.show', compact('commune'));
    }

    public function edit($id)
    {
        $commune = Commune::findOrFail($id);
        $provinces = Province::all();
        return view('commune.edit', compact('commune', 'provinces'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'idProvince' => 'required|exists:provinces,id',
        ]);

        $commune = Commune::findOrFail($id);
        $commune->update([
            'Nom' => $request->Nom,
            'idProvince' => $request->idProvince,
        ]);

        return redirect()->route('communes.index')->with('success', 'Commune mise à jour avec succès');
    }

    public function destroy($id)
    {
        $commune = Commune::findOrFail($id);
        $commune->delete();

        return redirect()->route('communes.index')->with('success', 'Commune supprimée avec succès');
    }
}
