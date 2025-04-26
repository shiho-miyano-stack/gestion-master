<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subvention;

class SubventionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $subventions = Subvention::when($search, function ($query, $search) {
                return $query->where('Type_Sub', 'like', "%{$search}%")
                             ->orWhere('Montant', 'like', "%{$search}%") ;
            })
               
            ->paginate(10); // 👈 Paginer 10 éléments par page
    
        return view('subvention.index', compact('subventions'));
    }

    // Formulaire de création
    public function create()
    {
        return view('subvention.create');
    }

    // Enregistre une nouvelle subvention
    public function store(Request $request)
    {
        $request->validate([
            'Type_Sub' => 'required|string|max:100',
            'Montant' => 'required|numeric',
            'DateTransfert' => 'required|date',
            'DateDepot' => 'required|date',
        ]);

        Subvention::create([
            'Type_Sub' => $request->Type_Sub,
            'Montant' => $request->Montant,
            'DateTransfert' => $request->DateTransfert,
            'DateDepot' => $request->DateDepot,
        ]);

        return redirect()->route('subventions.index')->with('success', 'Subvention ajoutée avec succès');
    }

    // Détail d’une subvention
    public function show($id)
    {
        $subvention = Subvention::findOrFail($id);
        return view('subvention.show', compact('subvention'));
    }

    // Formulaire d’édition
    public function edit($id)
    {
        $subvention = Subvention::findOrFail($id);
        return view('subvention.edit', compact('subvention'));
    }

    // Mise à jour d’une subvention
    public function update(Request $request, $id)
    {
        $request->validate([
            'Type_Sub' => 'required|string|max:100',
            'Montant' => 'required|numeric',
            'DateTransfert' => 'required|date',
            'DateDepot' => 'required|date',
        ]);

        $subvention = Subvention::findOrFail($id);
        $subvention->update([
            'Type_Sub' => $request->Type_Sub,
            'Montant' => $request->Montant,
            'DateTransfert' => $request->DateTransfert,
            'DateDepot' => $request->DateDepot,
        ]);

        return redirect()->route('subventions.index')->with('success', 'Subvention mise à jour avec succès');
    }

    // Supprimer une subvention
    public function destroy($id)
    {
        $subvention = Subvention::findOrFail($id);
        $subvention->delete();

        return redirect()->route('subventions.index')->with('success', 'Subvention supprimée avec succès');
    }
}
