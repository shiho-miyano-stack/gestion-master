@extends('layouts.app')

@section('content')
    <h1 style="text-align:center;">Créer une coopérative</h1>
    <div style="text-align: end">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajouterMembreModal" style="margin-top: 20px; width: 21%; height: 45px; border-radius: 10px;">
        <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>Ajouter un membre
    </button>
</div>
    <div class="modal fade" id="ajouterMembreModal" tabindex="-1" aria-labelledby="ajouterMembreModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> 
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ajouterMembreModalLabel">Ajouter un membre</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
              @include('membre.partials.create-form')
            </div>
          </div>
        </div>
      </div>
      <div style="text-align: end">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ajouterCollModal" style="margin-top: 20px; width: 21%; height: 45px; border-radius: 10px;">
            <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>Ajouter un collaborateur
        </button>
    </div>
    <div class="modal fade" id="ajouterCollModal" tabindex="-1" aria-labelledby="ajouterCollModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> 
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ajouterCollModalLabel">Ajouter un collaborateur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
              @include('membre.partials.create-coll')
            </div>
          </div>
        </div>
      </div>

      <h1 class="mb-4">Ajouter une Coopérative</h1>
    <form action="{{ route('cooperatives.store') }}" method="POST">
        @csrf

      <div class="row">
    <div class="col-md-6 mb-3">
        <label>Numéro Coopérative</label>
        <input type="number" name="NumCop" class="form-control" value="{{ old('NumCop', $cooperative->NumCop ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Nom Français</label>
        <input type="text" name="NomFr" class="form-control" required value="{{ old('NomFr', $cooperative->NomFr ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Nom Arabe</label>
        <input type="text" name="NomAr" class="form-control" required value="{{ old('NomAr', $cooperative->NomAr ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Commune</label>
        <select name="IdComm" class="form-control" required>
            <option value="">-- Sélectionner --</option>
            @foreach($communes as $commune)
                <option value="{{ $commune->Id }}" {{ old('IdComm', $cooperative->IdComm ?? '') == $commune->Id ? 'selected' : '' }}>
                    {{ $commune->Libelle }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Secteur</label>
        <select name="Secteur" class="form-control">
            <option value="">-- Sélectionner --</option>
            @foreach($secteurs as $secteur)
                <option value="{{ $secteur->Id }}" {{ old('Secteur', $cooperative->Secteur ?? '') == $secteur->Id ? 'selected' : '' }}>
                    {{ $secteur->Libelle }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Catégorie</label>
        <select name="Categorie" class="form-control">
            <option value="">-- Sélectionner --</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->Id }}" {{ old('Categorie', $cooperative->Categorie ?? '') == $categorie->Id ? 'selected' : '' }}>
                    {{ $categorie->Libelle }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Nombre Membres</label>
        <input type="number" name="NbrMem" class="form-control" value="{{ old('NbrMem', $cooperative->NbrMem ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Nombre Collaborateurs</label>
        <input type="number" name="NbrColl" class="form-control" value="{{ old('NbrColl', $cooperative->NbrColl ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Date de Création</label>
        <input type="date" name="DateCreation" class="form-control" value="{{ old('DateCreation', $cooperative->DateCreation ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label>Adresse</label>
        <input type="text" name="Adresse" class="form-control" value="{{ old('Adresse', $cooperative->Adresse ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Informations</label>
        <textarea name="Informations" class="form-control">{{ old('Informations', $cooperative->Informations ?? '') }}</textarea>
    </div>
</div>
    <div class="form-group">
        <label for="DejaBeneficie">Déjà Bénéficié</label>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="DejaBeneficie" id="oui" value="1" {{ old('deja_beneficie') == 1 ? 'checked' : '' }}>
        <h5><label class="form-check-label" for="oui">Oui</label></h5>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="DejaBeneficie" id="non" value="0" {{ old('deja_beneficie') == 0 ? 'checked' : '' }}>
        <h5><label class="form-check-label" for="non">Non</label></h5>
    </div>
    </div>
    
    <div class="form-group">
        <label for="Nbr_Benifiement">Nombre de bénificement</label>
        <input type="number" name="Nbr_Benifiement" class="form-control">
    </div> 
    <div class="text-center">
        <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
            Enregistrer
        </button>
    </div>
    
    
   
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('#formAjouterMembre').on('submit', function(e) {
          e.preventDefault();  

          var form = $(this);
          var url = form.attr('action');  
          var formData = form.serialize();  

          $.ajax({
              type: 'POST',
              url: url,
              data: formData,
              success: function(response) {
                  if(response.success) {
                      alert('Membre ajouté avec succès !');
                      $('#ajouterMembreModal').modal('hide');
                      $('.modal-backdrop').remove();
                      $('body').removeClass('modal-open');
                      form[0].reset();
                  } else {
                      alert('Erreur lors de l\'ajout du membre.');
                  }
              },
              error: function(xhr) {
                  alert('Une erreur est survenue lors de la soumission.');
              }
          });
      });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('#formAjouterColl').on('submit', function(e) {
          e.preventDefault();  

          var form = $(this);
          var url = form.attr('action');
          var formData = form.serialize();

          $.ajax({
              type: 'POST',
              url: url,
              data: formData,
              success: function(response) {
                  if(response.success) {
                      alert('Collaborateur ajouté avec succès !');
                      $('#ajouterCollModal').modal('hide');
                      $('.modal-backdrop').remove();
                      $('body').removeClass('modal-open');

                      form[0].reset();
                  } else {
                      alert('Erreur lors de l\'ajout du collaborateur.');
                  }
              },
              error: function(xhr) {
                  console.error('Erreur AJAX :', xhr.responseText);
                  alert('Une erreur est survenue lors de la soumission du formulaire.');
              }
          });
      });
  });
</script>

    <div class="text-center">
        <a href="{{ route('cooperatives.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
</div>
@endsection      