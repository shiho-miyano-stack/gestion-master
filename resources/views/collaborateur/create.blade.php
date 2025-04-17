<form action="{{ route('collaborateurs.store') }}" method="POST" id="formAjouterColl">
        @csrf
        <div class="mb-3">
            <label for="NomFr" class="form-label">Nom (Français)</label>
            <input type="text" class="form-control" name="NomFr" required>
        </div>
        <div class="mb-3">
            <label for="NomAr" class="form-label">Nom (Arabe)</label>
            <input type="text" class="form-control" name="NomAr" required>
        </div>
        <div class="mb-3">
            <label for="CIN" class="form-label">CIN</label>
            <input type="text" class="form-control" name="CIN" required>
        </div>
        <div class="mb-3">
            <label for="Telephonne" class="form-label">Téléphone</label>
            <input type="text" class="form-control" name="Telephonne" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" name="Email" required>
        </div>
        <div class="form-group">
            <label>ID Coopérative (optionnel)</label>
            <input type="number" name="id_coop" class="form-control">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3" style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                Enregistrer
            </button>
        </div>
</form>