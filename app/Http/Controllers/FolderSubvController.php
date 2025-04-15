<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FolderSubv;
use App\Models\Subvention;

class FolderSubvController extends Controller
{
    public function index()
    {
        $folderSubvs = FolderSubv::with('subvention')->get(); // Récupérer avec la relation Subvention
        return view('folder_subv.index', compact('folderSubvs'));
    }
    

    // Afficher le formulaire de création
    public function create()
    {
        $subventions = Subvention::all(); // Pour afficher les subventions dans le select
        return view('folder_subv.create', compact('subventions'));
    }

    // Enregistrer un nouveau FolderSubv
    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Size' => 'required|integer',
            'idSubv' => 'required|exists:subventions,id', // Validation pour idSubv
            'Observation' => 'nullable|string',
        ]);

        FolderSubv::create([
            'Nom' => $request->Nom,
            'Size' => $request->Size,
            'idSubv' => $request->idSubv,
            'Observation' => $request->Observation,
        ]);

        return redirect()->route('folder_subv.index')->with('success', 'Folder Subvention ajouté avec succès');
    }

    // Afficher les détails d'un FolderSubv spécifique
    public function show($id)
    {
        $folderSubv = FolderSubv::with('subvention')->findOrFail($id);
        return view('folder_subv.show', compact('folderSubv'));
    }

    // Afficher le formulaire de modification d'un FolderSubv existant
    public function edit($id)
    {
        $folderSubv = FolderSubv::findOrFail($id);
        $subventions = Subvention::all();
        return view('folder_subv.edit', compact('folderSubv', 'subventions'));
    }

    // Mettre à jour un FolderSubv
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Size' => 'required|integer',
            'idSubv' => 'required|exists:subventions,id',
            'Observation' => 'nullable|string',
        ]);

        $folderSubv = FolderSubv::findOrFail($id);
        $folderSubv->update([
            'Nom' => $request->Nom,
            'Size' => $request->Size,
            'idSubv' => $request->idSubv,
            'Observation' => $request->Observation,
        ]);

        return redirect()->route('folder_subv.index')->with('success', 'Folder Subvention mis à jour avec succès');
    }

    // Supprimer un FolderSubv
    public function destroy($id)
    {
        $folder_Subv = FolderSubv::findOrFail($id);
        $folder_Subv->delete();
        return redirect()->route('folder_subv.index')->with('success', 'Folder Subvention supprimé avec succès');
    }
}
