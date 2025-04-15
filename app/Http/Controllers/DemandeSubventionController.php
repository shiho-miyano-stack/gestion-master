<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DemandeSubvention;
use App\Models\Cooperative;
use App\Models\Subvention;


class DemandeSubventionController extends Controller
{
    public function index()
    {
        $demandes = DemandeSubvention::with(['cooperative', 'subvention'])->get();
        return view('demande_subvention.index', compact('demandes'));
    }

    public function create()
    {   
        $cooperatives = Cooperative::all();
        $subventions = Subvention::all();
        return view('demande_subvention.create', compact('cooperatives','subventions'));
    }

    public function store(Request $request)
    {  
        $request->validate([
            'Satut' => 'required|string|max:100',
            'Observation' => 'nullable|string',
            'IdCoop' => 'required|exists:cooperative,Id',
            'IdSubv' => 'required|exists:subvention,Id',
        ]);

        DemandeSubvention::create($request->all());

        return redirect()->route('demande_subventions.index')->with('success', 'Demande enregistrée avec succès');
    }

    public function show($id)
    {
        $demande = DemandeSubvention::with(['cooperative', 'subvention'])->findOrFail($id);
        return view('demande_subvention.show', compact('demande'));
    }

    public function edit($id)
    {
        $demande = DemandeSubvention::findOrFail($id);
        $cooperatives = Cooperative::all();
        $subventions = Subvention::all();
        return view('demande_subvention.edit', compact('demande', 'cooperatives', 'subvention'));
    }

    public function update(Request $request, $id)
    { 
        $request->validate([
            'Statut' => 'required|string|max:100',
            'Observation' => 'nullable|string',
            'IdCoop' => 'required|exists:cooperative,Id',
            'IdSubv' => 'required|exists:subvention,Id',
        ]);

        $demande = DemandeSubvention::findOrFail($id);
        $demande->update($request->all());

        return redirect()->route('demande_subventions.index')->with('success', 'Demande mise à jour');
    }

    public function destroy($id)
    {
        $demande = DemandeSubvention::findOrFail($id);
        $demande->delete();

        return redirect()->route('demande_subventions.index')->with('success', 'Demande supprimée');
    }
}
