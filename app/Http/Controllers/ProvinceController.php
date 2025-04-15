<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        return view('province.index', compact('provinces'));
    }

   
    public function create()
    {
        return view('province.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'Libelle' => 'required|string|max:100',
        ]);

        Province::create([
            'Libelle' => $request->Libelle,
        ]);

        return redirect()->route('provinces.index')->with('success', 'Province ajoutée avec succès');
    }

    
    public function show($id)
    {
        $province = Province::findOrFail($id);
        return view('province.show', compact('province'));
    }

    
    public function edit($id)
    {
        $province = Province::findOrFail($id);
        return view('province.edit', compact('province'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'Libelle' => 'required|string|max:100',
        ]);

        $province = Province::findOrFail($id);
        $province->update([
            'Libelle' => $request->Libelle,
        ]);

        return redirect()->route('provinces.index')->with('success', 'Province mise à jour avec succès');
    }

  
    public function destroy($id)
    {
        $province = Province::findOrFail($id);
        $province->delete();

        return redirect()->route('provinces.index')->with('success', 'Province supprimée avec succès');
    }
}
