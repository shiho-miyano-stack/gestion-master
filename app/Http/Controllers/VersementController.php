<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versement;
use App\Models\Subvention;

class VersementController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $versements = Versement::with('subvention')
        ->when($search, function ($query, $search) {
            return $query->where('Montant', 'like', "%{$search}%")
                         ->orWhere('mode_paiement', 'like', "%{$search}%");
                       
                         })
        
        ->paginate(10);

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
            'DateVers' => 'nullable|date',
            'Montant' => 'nullable|numeric',
            'IdSubv' => 'required|exists:subvention,Id',
            'periode_debut' => 'nullable|date',
            'periode_fin' => 'nullable|date',
            'mode_paiement' => 'nullable|string|max:100',
            'reference_paiement' => 'nullable|string|max:100',
            'observation' => 'nullable|string',
        ]);

        Versement::create($request->all());
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
            'DateVers' => 'nullable|date',
            'Montant' => 'nullable|numeric',
            'IdSubv' => 'required|exists:subvention,Id',
            'periode_debut' => 'nullable|date',
            'periode_fin' => 'nullable|date',
            'mode_paiement' => 'nullable|string|max:100',
            'reference_paiement' => 'nullable|string|max:100',
            'observation' => 'nullable|string',
        ]);

        $versement = Versement::findOrFail($id);
        $versement->update($request->all());

        return redirect()->route('versements.index')->with('success', 'Versement mis à jour avec succès');
    }


    public function destroy($id)
    {
        $versement = Versement::findOrFail($id);
        $versement->delete();
        return redirect()->route('versements.index')->with('success', 'Versement supprimé avec succès');
    }
}
