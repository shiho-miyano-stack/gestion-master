@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier la Coopérative</h1>
    <form action="{{ route('cooperatives.update', $cooperative->Id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="form-group col-md-6">
            <label>Numéro Coopérative</label>
            <input type="number" name="NumCop" class="form-control" value="{{ old('NumCop', $cooperative->NumCop ?? '') }}">
        </div>
    </div>

    <details class="border rounded p-3 mb-3 mt-4" id="Cooperative_Form">
        <summary class="fw-bold text-primary">Coopérative</summary>

        <div class="row mt-3">
            <div class="form-group col-md-6">
                <label>Nom Français</label>
                <input type="text" name="NomFr" class="form-control" value="{{ old('NomFr', $cooperative->NomFr ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Nom Arabe</label>
                <input type="text" name="NomAr" class="form-control" value="{{ old('NomAr', $cooperative->NomAr ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Province</label>
                <select name="Province" class="form-control">
                    <option value="">-- Sélectionner une province --</option>
                    @foreach(['عمالة وجدة انكاد','اقليم بركان','اقليم جرادة','اقليم تاوريرت','اقليم فكيك','اقليم الناظور','اقليم الدريوش','اقليم جرسيف'] as $province)
                        <option value="{{ $province }}" {{ old('Province', $cooperative->Province ?? '') == $province ? 'selected' : '' }}>{{ $province }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Commune</label>
                <select name="IdComm" class="form-control">
                    <option value="">-- Sélectionner une commune --</option>
                    @foreach($communes as $commune)
                        <option value="{{ $commune->Id }}" {{ old('IdComm', $cooperative->IdComm ?? '') == $commune->Id ? 'selected' : '' }}>{{ $commune->Libelle }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Siège</label>
                <input type="text" name="Siege" class="form-control" value="{{ old('Siege', $cooperative->Siege ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Nature de Siège</label>
                <select name="Nature_siege" class="form-control siege-select">
                    @php $natureOptions = ['كراء','شراء','رهن الاشارة','ملك','Autre']; @endphp
                    <option value="">-- Sélectionner la nature du siège --</option>
                    @foreach($natureOptions as $option)
                        <option value="{{ $option }}" {{ old('Nature_siege', $cooperative->Nature_siege ?? '') == $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row autre-siege" style="{{ old('Nature_siege', $cooperative->Nature_siege ?? '') == 'Autre' ? '' : 'display: none;' }}">
            <div class="form-group col-md-6">
                <label for="autreSiege">Précisez la nature du siège</label>
                <input type="text" name="autreSiege_membre" class="form-control" value="{{ old('autreSiege_membre', $cooperative->autreSiege_membre ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Numéro d'enregistrement</label>
                <input type="text" name="NumEnre" class="form-control" value="{{ old('NumEnre', $cooperative->NumEnre ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Date d'enregistrement</label>
                <input type="date" name="Date_Enre" class="form-control" value="{{ old('Date_Enre', $cooperative->Date_Enre ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Numéro d'enregistrement fiscal</label>
                <input type="text" name="NumInscripFiscal" class="form-control" value="{{ old('NumInscripFiscal', $cooperative->NumInscripFiscal ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Date de Création</label>
                <input type="date" name="DateCreation" class="form-control" value="{{ old('DateCreation', $cooperative->DateCreation ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Téléphone</label>
                <input type="number" name="Telephonne" class="form-control" value="{{ old('Telephonne', $cooperative->Telephonne ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" value="{{ old('Email', $cooperative->Email ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Statut de la coopérative</label>
                <select name="Statut_coop" class="form-control">
                    <option value="">-- Sélectionner le statut de la cooperative --</option>
                    <option value="نشيطة" {{ old('Statut_coop', $cooperative->Statut_coop ?? '') == 'نشيطة' ? 'selected' : '' }}>نشيطة</option>
                    <option value="غير نشيطة" {{ old('Statut_coop', $cooperative->Statut_coop ?? '') == 'غير نشيطة' ? 'selected' : '' }}>غير نشيطة</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Secteur</label>
                <select name="Secteur" class="form-control secteur-select">
                    @php $secteurs = ['الفلاحة','الصناعة التقليدية','المواد الغدائية','رقمية','سكنية','النقل','النباتات الطبية والعطرية','Autre']; @endphp
                    <option value="">-- Sélectionner le secteur --</option>
                    @foreach($secteurs as $secteur)
                        <option value="{{ $secteur }}" {{ old('Secteur', $cooperative->Secteur ?? '') == $secteur ? 'selected' : '' }}>{{ $secteur }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row autre-secteur" style="{{ old('Secteur', $cooperative->Secteur ?? '') == 'Autre' ? '' : 'display: none;' }}">
            <div class="form-group col-md-6">
                <label>Précisez le secteur</label>
                <input type="text" name="autreSecteur_membre" class="form-control" value="{{ old('autreSecteur_membre', $cooperative->autreSecteur_membre ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label>Les activités de la coopérative</label>
                <textarea name="Activites_coop" class="form-control">{{ old('Activites_coop', $cooperative->Activites_coop ?? '') }}</textarea>
            </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
                <label>Capital</label>
                <input type="text" name="Capital" class="form-control" value="{{ old('Capital', $cooperative->Capital ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Le chiffre d'affaire</label>
                <input type="text" name="Chiffre_affaire" class="form-control" value="{{ old('Chiffre_affaire', $cooperative->Chiffre_affaire ?? '') }}">
            </div>
        </div>
        <div class="row"> 
            <div class="form-group col-md-6">
                <label>Les équipements</label>
                <textarea name="Equipements" class="form-control">{{ old('Equipements', $cooperative->Equipements ?? '') }}</textarea>
            </div>
            <div class="form-group col-md-6">
                <label>Date de la derniere assemblé</label>
                <input type="date" name="Date_dernier_assemble" class="form-control" value="{{ old('Date_dernier_assemble', $cooperative->Date_dernier_assemble ?? '') }}">
            </div>
        </div>
        <div class="row"> 
            <div class="form-group col-md-6">
                <label>Les cordonnées sur X</label>
                <input type="text" name="Coord_X" class="form-control" value="{{ old('Coord_X', $cooperative->Coord_X ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Les cordonnées sur Y</label>
                <input type="text" name="Coord_Y" class="form-control" value="{{ old('Coord_Y', $cooperative->Coord_Y ?? '') }}">
            </div>
        </div> 

    </details>
    <details class="border rounded p-3 mb-3 mt-4" id="Member_details">
    <summary class="fw-bold text-primary">Les membres</summary>
    <div class="mt-2">
        <div class="row mt-4 mb-2"><b>Masculins</b></div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Nombre des membres masculins</label>
                <input type="number" id="NbrMemMasc" name="NbrMemMasc" class="form-control" value="{{ old('NbrMemMasc', $cooperative->NbrMemMasc ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Nombre des jeunes impliqués(18-35 ans) </label>
                <input type="number" id="NbrJeuneMemMasc" name="NbrJeuneMemMasc" class="form-control" value="{{ old('NbrJeuneMemMasc', $cooperative->NbrJeuneMemMasc ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Âge du plus jeune membre </label>
                <input type="number" id="AgeJeuneMemMasc" name="AgeJeuneMemMasc" class="form-control" value="{{ old('AgeJeuneMemMasc', $cooperative->AgeJeuneMemMasc ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Âge du membre le plus âgé </label>
                <input type="number" id="AgeGrandMemMasc" name="AgeGrandMemMasc" class="form-control" value="{{ old('AgeGrandMemMasc', $cooperative->AgeGrandMemMasc ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Nombre des membres féminins</label>
                <input type="number" id="NbrMemFem" name="NbrMemFem" class="form-control" value="{{ old('NbrMemFem', $cooperative->NbrMemFem ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Nombre des jeunes femmes impliquées(18-35 ans) </label>
                <input type="number" id="NbrJeuneMemFem" name="NbrJeuneMemFem" class="form-control" value="{{ old('NbrJeuneMemFem', $cooperative->NbrJeuneMemFem ?? '') }}">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-6">
                <label>Âge du plus jeune membre </label>
                <input type="number" id="AgeJeuneMemFem" name="AgeJeuneMemFem" class="form-control" value="{{ old('AgeJeuneMemFem', $cooperative->AgeJeuneMemFem ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Âge du membre le plus âgé </label>
                <input type="number" id="AgeGrandMemFem" name="AgeGrandMemFem" class="form-control" value="{{ old('AgeGrandMemFem', $cooperative->AgeGrandMemFem ?? '') }}">
            </div>
        </div>

        <div class="row mt-3 mb-2"><b>Autres détails</b></div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Nombre de membres bénéficiant de la sécurité sociale </label>
                <input type="number" id="NbrMemSs" name="NbrMemSs" class="form-control" value="{{ old('NbrMemSs', $cooperative->NbrMemSs ?? '') }}">
            </div>
        </div>
    </div>
</details>
<details class="border rounded p-3 mb-3 mt-4" id="Collaborator_details_edit">
    <summary class="fw-bold text-primary">Les collaborateurs </summary>
    <div class="mt-2">
        <div class="row mt-4 mb-2"><b>Masculins</b></div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Nombre des collaborateurs masculins</label>
                <input type="number" id="NbrCollMasc_edit" name="NbrCollMasc" class="form-control" value="{{ old('NbrCollMasc', $cooperative->NbrCollMasc ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Âge du plus jeune collaborateur</label>
                <input type="number" id="AgeJeuneCollMasc_edit" name="AgeJeuneCollMasc" class="form-control" value="{{ old('AgeJeuneCollMasc', $cooperative->AgeJeuneCollMasc ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Âge du collaborateur le plus âgé</label>
                <input type="number" id="AgeGrandCollMasc_edit" name="AgeGrandCollMasc" class="form-control" value="{{ old('AgeGrandCollMasc', $cooperative->AgeGrandCollMasc ?? '') }}">
            </div>
        </div>

        <div class="row mt-4 mb-2"><b>Féminins</b></div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Nombre de collaborateurs féminins</label>
                <input type="number" id="NbrCollFem_edit" name="NbrCollFem" class="form-control" value="{{ old('NbrCollFem', $cooperative->NbrCollFem ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Âge du plus jeune collaborateur</label>
                <input type="number" id="AgeJeuneCollFem_edit" name="AgeJeuneCollFem" class="form-control" value="{{ old('AgeJeuneCollFem', $cooperative->AgeJeuneCollFem ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Âge du collaborateur le plus âgé</label>
                <input type="number" id="AgeGrandCollFem_edit" name="AgeGrandCollFem" class="form-control" value="{{ old('AgeGrandCollFem', $cooperative->AgeGrandCollFem ?? '') }}">
            </div>
        </div>
    </div>
</details>


    


<script>
    // Afficher/masquer les champs "Autre" selon sélection
    document.querySelector('.siege-select')?.addEventListener('change', function() {
        document.querySelector('.autre-siege').style.display = this.value === 'Autre' ? 'flex' : 'none';
    });

    document.querySelector('.secteur-select')?.addEventListener('change', function() {
        document.querySelector('.autre-secteur').style.display = this.value === 'Autre' ? 'flex' : 'none';
    });
</script>

   

   
</div>
<button type="submit" class="btn btn-primary">Mettre à jour</button>
<div class="text-center">
<a href="{{ route('cooperatives.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>

</form>
</div>
@endsection