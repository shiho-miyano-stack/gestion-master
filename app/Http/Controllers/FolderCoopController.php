<?php

namespace App\Http\Controllers;

use App\Models\FolderCoop;
use App\Models\Cooperative;
use Illuminate\Http\Request;

class FolderCoopController extends Controller
{
    public function index()
    {
        $folders = FolderCoop::with('cooperative')->get();
        return view('folder_coop.index', compact('folders'));
    }

    public function create()
    {
        $cooperatives = Cooperative::all();
        return view('folder_coop.create', compact('cooperatives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Size' => 'required|numeric',
            'Observation' => 'nullable|string',
            'IdCoop' => 'required|exists:cooperative,Id',
        ]);

        FolderCoop::create($request->all());

        return redirect()->route('folder_coops.index')->with('success', 'Folder créé avec succès');
    }

    public function show($id)
    {
        $folder = FolderCoop::with('cooperative')->findOrFail($id);
        return view('folder_coop.show', compact('folder'));
    }

    public function edit($id)
    {
        $folder = FolderCoop::findOrFail($id);
        $cooperatives = Cooperative::all();
        return view('folder_coop.edit', compact('folder', 'cooperatives'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Size' => 'required|numeric',
            'Observation' => 'nullable|string',
            'IdCoop' => 'required|exists:cooperative,Id',
        ]);

        $folder = FolderCoop::findOrFail($id);
        $folder->update($request->all());

        return redirect()->route('folder_coops.index')->with('success', 'Folder mis à jour');
    }

    public function destroy($id)
    {
        $folder = FolderCoop::findOrFail($id);
        $folder->delete();

        return redirect()->route('folder_coops.index')->with('success', 'Folder supprimé');
    }
}