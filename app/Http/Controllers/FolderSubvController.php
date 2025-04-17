<?php

namespace App\Http\Controllers;

use App\Models\FolderSubv;
use App\Models\Subvention;
use Illuminate\Http\Request;

class FolderSubvController extends Controller
{
    public function index()
    {
        $folders = FolderSubv::with('subvention')->get();
        return view('folder_subv.index', compact('folders'));
    }

    public function create()
    {
        $subventions = Subvention::all();
        return view('folder_subv.create', compact('subventions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'nullable|string|max:500',
            'Size' => 'nullable|numeric',
            'IdSubv' => 'required|exists:subvention,Id',
            'Observation' => 'nullable|string|max:1000',
        ]);

        FolderSubv::create($request->all());
        return redirect()->route('folder_subvs.index')->with('success', 'Dossier ajouté avec succès.');
    }

    public function show($id)
    {
        $folder = FolderSubv::findOrFail($id);
        return view('folder_subv.show', compact('folder'));
    }

    public function edit($id)
    {
        $folder = FolderSubv::findOrFail($id);
        $subventions = Subvention::all();
        return view('folder_subv.edit', compact('folder', 'subventions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'nullable|string|max:500',
            'Size' => 'nullable|numeric',
            'IdSubv' => 'required|exists:subvention,Id',
            'Observation' => 'nullable|string|max:1000',
        ]);

        $folder = FolderSubv::findOrFail($id);
        $folder->update($request->all());

        return redirect()->route('folder_subvs.index')->with('success', 'Dossier mis à jour.');
    }

    public function destroy($id)
    {
        FolderSubv::destroy($id);
        return redirect()->route('folder_subvs.index')->with('success', 'Dossier supprimé.');
    }
}
