<?php

namespace App\Http\Controllers;

use App\Models\Collaborateur;
use Illuminate\Http\Request;

class CollaborateurController extends Controller
{
    
   

        // Afficher la liste des collaborateurs
        public function index()
        {
            $collaborateurs = Collaborateur::all();
            return view('collaborateur.index', compact('collaborateurs'));
        }
    
        // Afficher le formulaire de création d'un nouveau collaborateur
        public function create()
        {
            return view('collaborateur.create');
        }
    
        // Enregistrer un nouveau collaborateur
        public function store(Request $request)
        {
            // Validation des données du formulaire
            $request->validate([
                'NomFr' => 'required|string|max:100',
                'NomAr' => 'required|string|max:100',
                'CIN' => 'required|string|max:20',
                'Telephonne' => 'required|string|max:15',
                'Email' => 'required|email|max:100',
            ]);
    
            // Créer un nouveau collaborateur
            Collaborateur::create([
                'NomFr' => $request->NomFr,
                'NomAr' => $request->NomAr,
                'CIN' => $request->CIN,
                'Telephonne' => $request->Telephonne,
                'Email' => $request->Email,
            ]);
    
            if ($request->ajax()) {
                return response()->json(['success' => true]);
            } 
        }
    
        // Afficher les détails d’un collaborateur
        public function show($id)
        {
            $collaborateur = Collaborateur::findOrFail($id);
            return view('collaborateur.show', compact('collaborateur'));
        }
    
        // Afficher le formulaire de modification
        public function edit($id)
        {
            $collaborateur = Collaborateur::findOrFail($id);
            return view('collaborateur.edit', compact('collaborateur'));
        }
    
        // Mettre à jour un collaborateur
        public function update(Request $request, $id)
        {
            // Validation des données du formulaire
            $request->validate([
                'NomFr' => 'required|string|max:100',
                'NomAr' => 'required|string|max:100',
                'CIN' => 'required|string|max:20',
                'Telephonne' => 'required|string|max:15',
                'Email' => 'required|email|max:100',
            ]);
    
            // Trouver le collaborateur à modifier
            $collaborateur = Collaborateur::findOrFail($id);
    
            // Mise à jour
            $collaborateur->update([
                'NomFr' => $request->NomFr,
                'NomAr' => $request->NomAr,
                'CIN' => $request->CIN,
                'Telephonne' => $request->Telephonne,
                'Email' => $request->Email,
            ]);
    
            return redirect()->route('collaborateurs.index')->with('success', 'Collaborateur mis à jour avec succès');
        }
    
        // Supprimer un collaborateur
        public function destroy($id)
        {
            $collaborateur = Collaborateur::findOrFail($id);
            $collaborateur->delete();
    
            return redirect()->route('collaborateurs.index')->with('success', 'Collaborateur supprimé avec succès');
        }
}
   


