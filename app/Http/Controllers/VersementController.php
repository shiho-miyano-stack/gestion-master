<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versement;
use App\Models\Subvention;

class VersementController extends Controller
{
    public function index()
    {
        $versements = Versement::with('subvention')->get();
        return view('versement.index', compact('versements'));
    }

   
    public function create()
    {
        $subventions = Subvention::all();
        return view('versement.create', compact('subventions'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'DateVers' => 'required|date',
            'Montant' => 'required|numeric',
            'IdSubv' => 'required|exists:subvention,Id',
        ]);

        Versement::create([
            'DateVers' => $request->DateVers,
            'Montant' => $request->Montant,
            'IdSubv' => $request->IdSubv,
        ]);

        return redirect()->route('versements.index')->with('success', 'Versement ajouté avec succès');
    }

    
    public function show($id)
    {
        $versement = Versement::with('subvention')->findOrFail($id);
        return view('versement.show', compact('versement'));
    }

   
    public function edit($id)
    {
        $versement = Versement::findOrFail($id);
        $subventions = Subvention::all();
        return view('versement.edit', compact('versement', 'subventions'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'DateVers' => 'required|date',
            'Montant' => 'required|numeric',
            'IdSubv' => 'required|exists:subvention,Id',
        ]);

        $versement = Versement::findOrFail($id);
        $versement->update([
            'DateVers' => $request->DateVers,
            'Montant' => $request->Montant,
            'IdSubv' => $request->IdSubv,
        ]);

        return redirect()->route('versements.index')->with('success', 'Versement mis à jour avec succès');
    }


    public function destroy($id)
    {
        $versement = Versement::findOrFail($id);
        $versement->delete();
        return redirect()->route('versements.index')->with('success', 'Versement supprimé avec succès');
    }
}
