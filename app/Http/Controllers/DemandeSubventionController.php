<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\DemandeSubvention;
use App\Models\Cooperative;
use App\Models\Subvention;

class DemandeSubventionController extends Controller
{
    public function index(Request $request)
    {    
        $search = $request->input('search');

        $demandes = DemandeSubvention::with(['cooperative', 'subvention'])
        ->when($search, function ($query, $search) {
            return $query->where('Satut', 'like', "%{$search}%");
        })
        ->paginate(10); 
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
            'fichier' => 'nullable|file|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('fichier')) {
            $data['fichier'] = $request->file('fichier')->store('subventions', 'public');
        }

        DemandeSubvention::create($data);

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
        return view('demande_subvention.edit', compact('demande', 'cooperatives', 'subventions'));
    }

    public function update(Request $request, $id)
    { 
        $request->validate([
            'Satut' => 'required|string|max:100',
            'Observation' => 'nullable|string',
            'IdCoop' => 'required|exists:cooperative,Id',
            'IdSubv' => 'required|exists:subvention,Id',
            'fichier' => 'nullable|file|max:2048',
        ]);

        $demande = DemandeSubvention::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('fichier')) {
            // Supprimer l'ancien fichier si existant
            if ($demande->fichier) {
                Storage::disk('public')->delete($demande->fichier);
            }

            $data['fichier'] = $request->file('fichier')->store('subventions', 'public');
        }

        $demande->update($data);

        return redirect()->route('demande_subventions.index')->with('success', 'Demande mise à jour');
    }

    public function destroy($id)
    {
        $demande = DemandeSubvention::findOrFail($id);

        // Supprimer le fichier si existant
        if ($demande->fichier) {
            Storage::disk('public')->delete($demande->fichier);
        }

        $demande->delete();

        return redirect()->route('demande_subventions.index')->with('success', 'Demande supprimée');
    }
}

