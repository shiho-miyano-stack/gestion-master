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
    <form action="{{ route('cooperatives.store') }}" method="POST" >
    @csrf
    <div class="form-group">
        <label for="NumCop">Numéro de Coopérative</label>
        <input type="number" name="NumCop" class="form-control"  required>
    </div>
    <div class="form-group">
        <label for="NomFr">Nom (Français)</label>
        <input type="text" name="NomFr" class="form-control"required>
    </div>
    <div class="form-group">
        <label for="NomAr">Nom (Arabe)</label>
        <input type="text" name="NomAr" class="form-control"  required>
    </div>
    <div class="form-group">
        <label for="Adresse">Adresse</label>
        <input type="text" name="Adresse" value="{{ old('NomAdresse') }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="Telephonne">Téléphone</label>
        <input type="text" name="Telephonne" class="form-control">
    </div>
    <div class="form-group">
        <label for="NbrMem">Nombre des membres</label>
        <input type="number" name="NbrMem" class="form-control">
    </div>
    <div class="form-group">
        <label for="NbrColl">Nombre des Collaborateurs</label>
        <input type="number" name="NbrColl" class="form-control">
    </div>
    <div class="form-group">
        <label for="DateCreation">Date de Création</label>
        <input type="date" name="DateCreation" class="form-control">
    </div>
    <div class="form-group">
        <label for="NumInscrip">Numéro d'Inscription</label>
        <input type="text" name="NumInscrip" class="form-control">
    </div>
    <div class="form-group">
        <label for="NumAnalytique">Numéro Analytique</label>
        <input type="text" name="NumAnalytique" class="form-control">
    </div>
    <div class="form-group">
        <label for="IdComm">Province</label>
        <select name="IdProv" class="form-control" required>
            <option value="">Sélectionner une province</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->Id }}">{{ $province->Libelle}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="IdComm">Commune</label>
        <select name="IdComm" class="form-control" required>
            <option value="">Sélectionner une commune</option>
            @foreach ($communes as $commune)
                <option value="{{ $commune->Id }}">{{ $commune->Libelle}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="IdColl">Collaborateur</label>
        <select name="IdColl" class="form-control" required>
            <option value="">Sélectionner des collaborateurs</option>
            @foreach ($collaborateurs as $collaborateur)
                <option value="{{ $collaborateur->Id }}">{{ $collaborateur->Id}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="IdMem">Membre</label>
        <select name="IdMem" class="form-control" required>
            <option value="">Sélectionner des membres</option>
            @foreach ($membres as $membre)
                <option value="{{ $membre->Id }}">{{ $membre->Id}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Secteur">Secteur</label>
        <select name="Secteur" class="form-control" required>
            <option value="">Sélectionner un secteur</option>
            @foreach ($secteurs as $secteur)
                <option value="{{ $secteur->Id }}">{{ $secteur->Libelle }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Categorie">Catégorie</label>
        <select name="Categorie" class="form-control" required>
            <option value="">Sélectionner une catégorie</option>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->Id }}">{{ $categorie->Libelle }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Num_Ordre">Numéro d'ordre</label>
        <input type="number" name="Num_Ordre" class="form-control">
    </div>
    <div class="form-group">
        <label for="Date_Enre">Date d'enregistrement au bureau d'ordre</label>
        <input type="date" name="Date_Enre" class="form-control">
    </div>
    <div class="form-group">
        <label for="Informations">Informations</label>
        <textarea name="Informations" class="form-control"></textarea>
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
    <div class="text-center">
        <a href="{{ route('cooperatives.index') }}" class="btn btn-secondary" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">Annuler</a>
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
@endsection      