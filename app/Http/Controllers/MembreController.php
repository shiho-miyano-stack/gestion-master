<?php

namespace App\Http\Controllers;



namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;

class MembreController extends Controller
{
   
    public function index()
    {
        
        $membres = Membre::all();
        return view('membre.index', compact('membres'));
    }

   
    public function create()
    {
        return view('membre.create');
    }

   
    public function store(Request $request)
    {
       
        $request->validate([
            'NomFr' => 'required|string|max:100',
            'NomAr' => 'required|string|max:100',
            'CNI' => 'required|string|max:20',
            'Telephonne' => 'required|string|max:15',
            'Email' => 'required|email|max:100',
            'Poste' => 'required|string|max:50',
        ]);

       
        Membre::create([
            'NomFr' => $request->NomFr,
            'NomAr' => $request->NomAr,
            'CNI' => $request->CNI,
            'Telephonne' => $request->Telephonne,
            'Email' => $request->Email,
            'Poste' => $request->Poste,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }        //return redirect()->route('membres.index')->with('success', 'Membre ajouté avec succès');
    }

    
    public function show($id)
    {
       
        $membre = Membre::findOrFail($id);
        return view('membre.show', compact('membre'));
    }

   
    public function edit($id)
    {
       
        $membre = Membre::findOrFail($id);
        return view('membre.edit', compact('membre'));
    }

    
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'NomFr' => 'required|string|max:100',
            'NomAr' => 'required|string|max:100',
            'CNI' => 'required|string|max:20',
            'Telephonne' => 'required|string|max:15',
            'Email' => 'required|email|max:100',
            'Poste' => 'required|string|max:50',
        ]);

    
        $membre = Membre::findOrFail($id);
        $membre->update([
            'NomFr' => $request->NomFr,
            'NomAr' => $request->NomAr,
            'CNI' => $request->CNI,
            'Telephonne' => $request->Telephonne,
            'Email' => $request->Email,
            'Poste' => $request->Poste,
        ]);
        return redirect()->route('membres.index')->with('success', 'Membre mis à jour avec succès');
    }

   
    public function destroy($id)
    {
       
        $membre = Membre::findOrFail($id);
        $membre->delete();
        return redirect()->route('membres.index')->with('success', 'Membre supprimé avec succès');
    }
}
