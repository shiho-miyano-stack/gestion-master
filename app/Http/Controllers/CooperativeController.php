<?php

namespace App\Http\Controllers;

use App\Models\Cooperative;
use App\Models\Commune;
use App\Models\Categorie;
use App\Models\Secteur;
use App\Models\Membre;
use App\Models\Collaborateur;
use Illuminate\Http\Request;  

class CooperativeController extends Controller
{
    public function index(Request $request)  // Accepting $request as a parameter
{
    // Get the search query from the request
    $search = $request->input('search');

    // Fetch cooperatives and apply the search filter
    $cooperatives = Cooperative::with(['commune', 'secteur'])
        ->when($search, function ($query, $search) {
            return $query->where('NomFr', 'like', "%{$search}%")
                         ->orWhere('NomAr', 'like', "%{$search}%")
                         ->orWhere('Province', 'like', "%{$search}%")
                         ->orWhere('Secteur', 'like', "%{$search}%");
        })
        ->paginate(100); // Paginate the results, adjust the number as needed

    // Return the view with cooperatives data
    return view('cooperative.index', compact('cooperatives'));
}

    public function create()
    {
        $communes = Commune::all();
        $categories = Categorie::all();
        $secteurs = Secteur::all();
        return view('cooperative.create', compact('communes', 'categories', 'secteurs'));
    }

    public function store(Request $request)
    {
        // Création de la coopérative
        $cooperative = Cooperative::create([
            'NumCop' => $request->NumCop,
            'NomFr' => $request->NomFr,
            'NomAr' => $request->NomAr,
            'Province' => $request->Province,
            'IdComm' => $request->IdComm,
            'Siege' => $request->Siege,
            'Nature_siege' => $request->Nature_siege,
            'NumEnre' => $request->NumEnre,
            'Date_Enre' => $request->Date_Enre,
            'NumInscripFiscal' => $request->NumInscripFiscal,
            'DateCreation'=> $request->DateCreation,
            'Telephonne' => $request->Telephonne,
            'Email' => $request->Email,
            'Statut_coop' => $request->Statut_coop,
            'Secteur' => $request->Secteur,
            'Activites_coop' => $request->Activites_coop,
            'But_coop' => $request->But_coop,
            'Capital' => $request->Capital,
            'Chiffre_affaire' => $request->Chiffre_affaire,
            'Equipements' => $request->Equipements,
            'Date_dernier_assemble' => $request->Date_dernier_assemble,
            'Coord_X' => $request->Coord_X,
            'Coord_Y' => $request->Coord_Y,
            'NbrMemMasc' => $request->NbrMemMasc,
            'NbrJeuneMemMasc' => $request->NbrJeuneMemMasc,
            'AgeJeuneMemMasc' => $request->AgeJeuneMemMasc,
            'AgeGrandMemMasc' => $request->AgeGrandMemMasc,
            'NbrMemFem' => $request->NbrMemFem,
            'NbrJeuneMemFem' => $request->NbrJeuneMemFem,
            'AgeJeuneMemFem' => $request->AgeJeuneMemFem,
            'AgeGrandMemFem' => $request->AgeGrandMemFem,
            'NbrMemSs' => $request->NbrMemSs,
            'NbrMemRam' => $request->NbrMemRam,
            'NbrCollMasc' => $request->NbrCollMasc,
            'AgeJeuneCollMasc' => $request->AgeJeuneCollMasc,
            'AgeGrandCollMasc' => $request->AgeGrandCollMasc,
            'NbrCollFem' => $request->NbrCollFem,
            'AgeJeuneCollFem' => $request->AgeJeuneCollFem,
            'AgeGrandCollFem' => $request->AgeGrandCollFem,
        ]);
    
        // Enregistrement des membres
        if ($request->has('members')) {
            foreach ($request->members as $memberData) {
                Membre::create([
                    'NomFr' => $memberData['NomFr'],
                    'NomAr' => $memberData['NomAr'],
                    'CNI' => $memberData['CNI'],
                    'Date_naissance' => $memberData['Date_naissance'],
                    'Sexe' => $memberData['Sexe'],
                    'Situation_familiale' => $memberData['Situation_familiale'],
                    'id_coop' => $cooperative->Id,
                    'Niveau_etude' => $memberData['Niveau_etude'],
                    'Poste' => $memberData['Poste'],
                    'Telephonne' => $memberData['Telephonne'],
                    'Email' => $memberData['Email'],
                    'Couverture_sanitaire' => $memberData['Couverture_sanitaire'],
                    'Num_affiliation' => $memberData['Num_affiliation_caisse'],
                    'Metier' => $memberData['Metier'],
                    'Competences' => $memberData['Competences'],
                ]);
            }
        }
    
        // Enregistrement des collaborateurs + liaison à la coopérative
        if ($request->has('collaborators')) {
            foreach ($request->collaborators as $collaborateurData) {
                $collaborateur = Collaborateur::create([
                    'NomFr' => $collaborateurData['NomFr'],
                    'NomAr' => $collaborateurData['NomAr'],
                    'CIN' => $collaborateurData['CIN'],
                    'Date_naissance' => $collaborateurData['Date_naissance'],
                    'Sexe' => $collaborateurData['Sexe'],
                    'Situation_familiale' => $collaborateurData['Situation_familiale'],
                    'Niveau_etude' => $collaborateurData['Niveau_etude'],
                    'Poste' => $collaborateurData['Poste'],
                    'Telephonne' => $collaborateurData['Telephonne'],
                    'Email' => $collaborateurData['Email'],
                    'Couverture_sanitaire' => $collaborateurData['Couverture_sanitaire'],
                    'Num_affiliation' => $collaborateurData['Num_affiliation_caisse'],
                    'Metier' => $collaborateurData['Metier'],
                    'Competences' => $collaborateurData['Competences'],
                ]);
    
                // 👇 Ajout à la table pivot via la relation many-to-many
                $cooperative->collaborateurs()->attach($collaborateur->id);
            }
        }
    
        return redirect()->route('cooperatives.index')->with('success', 'Coopérative ajoutée avec succès.');
    }
    

    // Dans le contrôleur (par exemple, CooperativeController.php)
public function show($id)
{
    // Récupérer la coopérative avec ses membres associés
    $cooperative = Cooperative::with('membres')->find($id);

    if (!$cooperative) {
        // Si la coopérative n'existe pas
        return redirect()->route('cooperatives.index')->with('error', 'Coopérative non trouvée');
    }

    // Passer la coopérative et les membres à la vue
    return view('cooperative.show', compact('cooperative'));
}


    public function edit(Cooperative $cooperative)
    {
        $communes = Commune::all();
        $categories = Categorie::all();
        $secteurs = Secteur::all();
        return view('cooperative.edit', compact('cooperative', 'communes', 'categories', 'secteurs'));
    }

    public function update(Request $request, Cooperative $cooperative)
    {
        /*$request->validate([
            'NumCop' => 'nullable|integer',
            'NomFr' => 'required|string|max:500',
            'NomAr' => 'required|string|max:500',
            'Num_Ordre' => 'nullable|integer',
            'Date_Enre' => 'nullable|date',
            'Telephonne' => 'nullable|string|max:50',
            'NumInscrip' => 'nullable|string|max:500',
            'DateCreation' => 'nullable|date',
            'NumAnalytique' => 'nullable|string|max:500',
            'NbrMem' => 'required|integer',
            'NbrColl' => 'nullable|integer',
            'Secteur' => 'nullable|exists:secteur,Id',
            'Categorie' => 'nullable|exists:categorie,Id',
            'Adresse' => 'nullable|string|max:500',
            'Informations' => 'nullable|string|max:1000',
            'IdComm' => 'required|exists:commune,Id',
            'DejaBeneficie' => 'nullable|string|max:5',
            'Nbr_Benifiement' => 'nullable|integer',
        ]);
*/
        $cooperative->update($request->all());

        return redirect()->route('cooperatives.index')->with('success', 'Coopérative modifiée avec succès.');
    }

    public function destroy(Cooperative $cooperative)
    {
        $cooperative->delete();
        return redirect()->route('cooperatives.index')->with('success', 'Coopérative supprimée avec succès.');
    }
}