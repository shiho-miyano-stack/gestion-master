<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\DemandeSubvention;
use App\Models\DocumentJoint;




class DocumentJointController extends Controller
{
    public function index()
    {
        $documents = DocumentJoint::all();
        return view('document.index', compact('documents'));
    }

    
    public function create()
{
    $demandes = DemandeSubvention::all(); // ou ->with('subvention') si tu veux afficher les détails de la subvention

    return view('document.create', compact('demandes'));
}

    public function store(Request $request)
    {
        $request->validate([
            'demande_id' => 'nullable|exists:demande_subvention,Id',
            'document' => 'required|file|max:2048',
        ]);

        $fichier = $request->file('document');
        $nom = $fichier->getClientOriginalName();
        $type = $fichier->getClientMimeType();
        $chemin = $fichier->store('documents', 'public');

        DocumentJoint::create([
            'demande_id' => $request->demande_id,
            'nom_fichier' => $nom,
            'type_fichier' => $type,
            'chemin_fichier' => $chemin,
            'date_ajout' => now(),
        ]);

        return redirect()->route('documents.index')->with('success', 'Document ajouté.');
    }
    public function show($id)
    {
        $document = DocumentJoint::findOrFail($id);
        return view('document.show', compact('document'));
    }




    public function edit(DocumentJoint $document)
    {
        $demandes = DemandeSubvention::all(); // pour remplir le dropdown
    
        return view('document.edit', compact('document', 'demandes'));
    }

public function update(Request $request, DocumentJoint $document)
{
    $request->validate([
        'demande_id' => 'nullable|exists:demande_subvention,Id',
        'document' => 'nullable|file|max:2048',
    ]);

    $data = [
        'demande_id' => $request->demande_id,
        'date_ajout' => now(),
    ];

    if ($request->hasFile('document')) {
        // Supprimer l'ancien fichier
        if ($document->chemin_fichier) {
            Storage::delete($document->chemin_fichier);
        }

        $fichier = $request->file('document');
        $data['nom_fichier'] = $fichier->getClientOriginalName();
        $data['type_fichier'] = $fichier->getClientMimeType();
        $data['chemin_fichier'] = $fichier->store('documents', 'public');
    }

    $document->update($data);

    return redirect()->route('documents.index')->with('success', 'Document mis à jour avec succès.');
}


    public function destroy(DocumentJoint $document)
    {
        Storage::delete($document->chemin_fichier);
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document supprimé.');
    }
}
