<?php

namespace App\Http\Controllers;

use App\Models\CollabCoop;
use App\Models\Collaborateur;
use App\Models\Cooperative;
use Illuminate\Http\Request;

class CollabCoopController extends Controller
{
    public function index()
    {
        $relations = CollabCoop::with(['collaborateur', 'cooperative'])->get();
        return view('collab_coop.index', compact('relations'));
    }

    public function create()
    {
        $collaborateurs = Collaborateur::all();
        $cooperatives = Cooperative::all();
        return view('collab_coop.create', compact('collaborateurs', 'cooperatives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_coll' => 'required|exists:collaborateur,Id',
            'id_coop' => 'required|exists:cooperative,Id',
        ]);

        CollabCoop::create($request->all());

        return redirect()->route('collab_coop.index')->with('success', 'Relation créée');
    }

    public function show(CollabCoop $collabCoop)
    {
        return view('collab_coop.show', compact('collabCoop'));
    }

    public function edit(CollabCoop $collabCoop)
    {
        $collaborateurs = Collaborateur::all();
        $cooperatives = Cooperative::all();
        return view('collab_coop.edit', compact('collabCoop', 'collaborateurs', 'cooperatives'));
    }

    public function update(Request $request, CollabCoop $collabCoop)
    {
        $request->validate([
            'id_coll' => 'required|exists:collaborateur,Id',
            'id_coop' => 'required|exists:cooperative,Id',
        ]);

        $collabCoop->update($request->all());

        return redirect()->route('collab_coop.index')->with('success', 'Relation mise à jour');
    }

    public function destroy(CollabCoop $collabCoop)
    {
        $collabCoop->delete();
        return redirect()->route('collab_coop.index')->with('success', 'Relation supprimée');
    }
}
