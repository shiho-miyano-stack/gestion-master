@extends('layouts.app')

@section('content')
<style>
.custom-shadow {
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);

}

</style>
                        <h1 style="text-align:center;">Créer une coopérative</h1>
<form action="{{ route('cooperatives.store') }}" method="POST" id="myForm" >
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label>Numéro Coopérative</label>
                <input type="number" name="NumCop" class="form-control" value="{{ old('NumCop', $cooperative->NumCop ?? '') }}">
            </div>
            
        </div>
        <details class="border rounded p-3 mb-3 mt-4" id="Cooperative_Form">
        <summary class="fw-bold text-primary">Coopérative</summary>
        <div class="mt-2">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Nom Français الاسم بالفرنسية</label>
                    <input type="text" name="NomFr" class="form-control" value="{{ old('NomFr', $cooperative->NomFr ?? '') }}">
                </div>
                <div  class="form-group col-md-6">
                    <label>Nom Arabe الاسم بالعربية</label>
                    <input type="text" name="NomAr" class="form-control"  value="{{ old('NomAr', $cooperative->NomAr ?? '') }}">
                </div>
            </div>
            <div class="row">
                <div  class="form-group col-md-6">
                    <label>Provine</label>
                    <select name="Province" class="form-control" >
                        <option value="">-- Sélectionner une province --</option>
                        <option value="عمالة وجدة انكاد">عمالة وجدة انكاد</option>
                        <option value="اقليم بركان">اقليم بركان</option>
                        <option value="اقليم جرادة">اقليم جرادة</option>
                        <option value="اقليم تاوريرت">اقليم تاوريرت</option>
                        <option value="اقليم فكيك">اقليم فكيك</option>
                        <option value="اقليم الناظور">اقليم الناظور</option>
                        <option value="اقليم الدريوش">اقليم الدريوش</option>
                        <option value="اقليم جرسيف">اقليم جرسيف</option>

                    </select>
                </div>
                <div  class="form-group col-md-6">
                    <label>Commune</label>
                    <select name="IdComm" class="form-control" >
                        <option value="">-- Sélectionner une commune --</option>
                        @foreach($communes as $commune)
                            <option value="{{ $commune->Id }}" {{ old('IdComm', $cooperative->IdComm ?? '') == $commune->Id ? 'selected' : '' }}>
                                {{ $commune->Libelle }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                    <div  class="form-group col-md-6">
                        <label>Siège</label>
                        <input type="text" name="Siege" class="form-control" >
                    </div>
                    <div  class="form-group col-md-6">
                        <label>Nature de Siège</label>
                        <select name="Nature_siege" class="form-control siege-select" >
                            <option value="">-- Sélectionner la nature du siège --</option>
                                <option value="كراء">كراء</option>
                                <option value="شراء">شراء</option>
                                <option value="رهن الاشارة">رهن الاشارة</option>
                                <option value="ملك">ملك</option>
                                <option value="Autre">اخر</option>
                        </select>
                    </div>
            </div>
            <div class="row autre-siege" style="display: none;">
                <div class="form-group col-md-6">
                    <label for="autreSiege">Précisez la nature du siège</label>
                    <input type="text" name="autreSiege_membre" class="form-control">
                </div>
            </div>
            <div class="row">
                <div  class="form-group col-md-6">
                    <label>Numéro d'enregistrement</label>
                    <input type="text" name="NumEnre" class="form-control" >
                </div>
                <div  class="form-group col-md-6">
                    <label>Date d'enregistrement</label>
                    <input type="date" name="Date_Enre" class="form-control" >
                </div>
                
            </div>
            <div class="row">

            <div  class="form-group col-md-6">
                <label>Numéro d'enregistrement fiscal</label>
                <input type="text" name="NumInscripFiscal" class="form-control" >
            </div>
            <div  class="form-group col-md-6">
                <label>Date de Création</label>
                <input type="date" name="DateCreation" class="form-control" value="{{ old('DateCreation', $cooperative->DateCreation ?? '') }}">
            </div>
            </div>

            <div class="row">
                <div  class="form-group col-md-6">
                    <label>Téléphone</label>
                    <input type="number" name="Telephonne" class="form-control">
                </div>
                <div  class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="Email" class="form-control">
                </div>
            </div>            
            <div class="row">
                <div  class="form-group col-md-6">
                    <label>Statut de la coopérative</label>
                    <select name="Statut_coop" class="form-control" >
                        <option value="">-- Sélectionner le statut de la cooperative --</option>
                        <option value="نشيطة">نشيطة</option>
                        <option value="غير نشيطة">غير نشيطة</option>
                    </select>
                </div>
                <div  class="form-group col-md-6">
                    <label>Secteur</label>
                    <select name="Secteur" class="form-control secteur-select">
                        <option value="">-- Sélectionner le secteur --</option>
                        <option value="الفلاحة">الفلاحة</option>
                        <option value="الصناعة التقليدية">الصناعة التقليدية</option>
                        <option value="المواد الغدائية">المواد الغدائية</option>
                        <option value="رقمية">رقمية</option>
                        <option value="سكنية">سكنية</option>
                        <option value="النقل">النقل</option>
                        <option value="النباتات الطبية والعطرية">النباتات الطبية والعطرية</option>
                        <option value="Autre">اخر</option>
                    </select>
                </div>
            </div>
            <div class="row autre-secteur" style="display: none;">
                <div class="form-group col-md-6">
                    <label for="autreSecteur">Précisez le secteur</label>
                    <input type="text" name="autreSecteur_membre" class="form-control">
                </div>
            </div>
            <div class="row">
                <div  class="form-group col-md-6">
                    <label>Les activités de la coopérative</label>
                    <textarea name="Activites_coop" class="form-control"></textarea>
                </div>
                <div  class="form-group col-md-6">
                    <label>Le but de la coopérative</label>
                    <textarea name="But_coop" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div  class="form-group col-md-6">
                    <label>Capital</label>
                    <input type="text" name="Capital" class="form-control">
                </div>
                <div  class="form-group col-md-6">
                    <label>Le chiffre d'affaire</label>
                    <input type="text" name="Chiffre_affaire" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <div  class="form-group col-md-6">
                    <label>Les équipements</label>
                    <textarea name="Equipements" class="form-control"></textarea>
                </div>
                <div  class="form-group col-md-6">
                    <label>Date de la derniere assemblé</label>
                    <input type="date" name="Date_dernier_assemble" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div  class="form-group col-md-6">
                    <label>Les cordonnées sur X</label>
                    <input type="text" name="Coord_X" class="form-control" >
                </div>
                <div  class="form-group col-md-6">
                    <label>Les cordonnées sur Y</label>
                    <input type="text" name="Coord_Y" class="form-control" >
                </div>
            </div>
        </div>
        </details>

        <details class="border rounded p-3 mb-3 mt-4" id="Member_details">
            <summary class="fw-bold text-primary">Les membres</summary>
            <div class="mt-2">
                <div class="row mt-4 mb-2"><b>Masculins</b></div>
                <div class="row">
                    <div  class="form-group col-md-6">
                        <label>Nombre des membres masculins</label>
                        <input type="number" id="NbrMemMasc" name="NbrMemMasc" class="form-control" >
                    </div>
                    <div  class="form-group col-md-6">
                        <label>Nombre des jeunes impliqués(18-35 ans) </label>
                        <input type="number" id="NbrJeuneMemMasc" name="NbrJeuneMemMasc" class="form-control" >
                    </div>
                </div>
                <div class="row">
                    <div  class="form-group col-md-6">
                        <label>Âge du plus jeune membre </label>
                        <input type="number" id="AgeJeuneMemMasc" name="AgeJeuneMemMasc" class="form-control" >
                    </div>
                    <div  class="form-group col-md-6">
                        <label>Âge du membre le plus âgé </label>
                        <input type="number" id="AgeGrandMemMasc" name="AgeGrandMemMasc" class="form-control" >
                    </div>
                </div>
                
                <div class="row mt-3 mb-2"><b>Féminins</b></div>
                <div class="row">
                    <div  class="form-group col-md-6">
                        <label>Nombre des membres féminins</label>
                        <input type="number" id="NbrMemFem" name="NbrMemFem" class="form-control" >
                    </div>
                    <div  class="form-group col-md-6">
                        <label>Nombre des jeunes femmes impliqués(18-35 ans) </label>
                        <input type="number" id="NbrJeuneMemFem" name="NbrJeuneMemFem" class="form-control" >
                    </div>
                </div>
                
                <div class="row">
                    <div  class="form-group col-md-6">
                        <label>Âge du plus jeune membre </label>
                        <input type="number" id="AgeJeuneMemFem" name="AgeJeuneMemFem" class="form-control" >
                    </div>
                    <div  class="form-group col-md-6">
                        <label>Âge du membre le plus âgé </label>
                        <input type="number" id="AgeGrandMemFem" name="AgeGrandMemFem" class="form-control" >
                    </div>
                </div>

                <div class="row mt-3 mb-2"><b>Autre détailles</b></div>

                <div class="row">
                    <div  class="form-group col-md-6">
                        <label>Nombre de membres bénéficiant de la sécurité sociale </label>
                        <input type="number" id="NbrMemSs" name="NbrMemSs" class="form-control" >
                    </div>
                    <div  class="form-group col-md-6">
                        <label>Nombre de membres possédant une carte RAMED </label>
                        <input type="number" id="NbrMemRam" name="NbrMemRam" class="form-control" >
                    </div>
                </div>
            </div>
        </details>

        <details class="border rounded p-3 mb-3 mt-4" id="Collaborator_details">
            <summary class="fw-bold text-primary">Les collaborateurs</summary>
            <div class="mt-2">
                <div class="row mt-4 mb-2"><b>Masculins</b></div>
                <div class="row">
                    <div  class="form-group col-md-4">
                        <label>Nombre des collaborateurs masculins</label>
                        <input type="number" id="NbrCollMasc" name="NbrCollMasc" class="form-control" >
                    </div>
                    <div  class="form-group col-md-4">
                        <label>Âge du plus jeune collaborateur </label>
                        <input type="number" id="AgeJeuneCollMasc" name="AgeJeuneCollMasc" class="form-control" >
                    </div>
                    <div  class="form-group col-md-4">
                        <label>Âge du collaborateur le plus âgé </label>
                        <input type="number" id="AgeGrandCollMasc" name="AgeGrandCollMasc" class="form-control" >
                    </div>
                </div>
                <div class="row mt-4 mb-2"><b>Féminins</b></div>
                <div class="row">
                    <div  class="form-group col-md-4">
                        <label>Nombre de collaborateurs féminins</label>
                        <input type="number" id="NbrCollFem" name="NbrCollFem" class="form-control" >
                    </div>
                    <div  class="form-group col-md-4">
                        <label>Âge du plus jeune collaborateur </label>
                        <input type="number" id="AgeJeuneCollFem" name="AgeJeuneCollFem" class="form-control" >
                    </div>
                    <div  class="form-group col-md-4">
                        <label>Âge du collaborateur le plus âgé </label>
                        <input type="number" id="AgeGrandCollFem" name="AgeGrandCollFem" class="form-control" >
                    </div>
                </div>
            </div>
        </details>

        



    <div class="d-flex flex-column align-items-start" style="gap: 10px; margin-top:20px; margin-bottom:20px;">
        <button class="btn btn-success mb-2" id="add-membre" style="width: 200px; height: 40px; border-radius: 10px;">
            <i class="fas fa-plus-circle me-2 ms-n2"></i>Membre
        </button>
    
        <button class="btn btn-success" id="add-collaborateur" style="width: 200px; height: 40px; border-radius: 10px;">
            <i class="fas fa-plus-circle me-2 ms-n2"></i>Collaborateur
        </button>
    </div>

    <div id="member-form-zone">
    
    </div>

    <div id="collaborator-form-zone">
    
    </div>
    <template id="member-template">
        <div class="member-form custom-shadow mb-4 border p-3 rounded-4">
            <h5 style="text-align:center;">Membre <span class="member-index"></span></h5>
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="NomFr">Nom (Français)</label>
                    <input type="text" name="members[_index_][NomFr]" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="NomAr">Nom (Arabe)</label>
                    <input type="text" name="members[_index_][NomAr]" class="form-control" required>
                </div>
            </div>
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="CNI">CNI</label>
                    <input type="text" name="members[_index_][CNI]" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Date_naissance">Date de naissance</label>
                    <input type="date" name="members[_index_][Date_naissance]" class="form-control" required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Sexe</label>
                    <select name="members[_index_][Sexe]" class="form-control">
                        <option value="">-- Sélectionner le sexe --</option>
                        <option value="دكر">دكر</option>
                        <option value="انثى">انثى</option>  
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Situation familiale</label>
                    <select name="members[_index_][Situation_familiale]" class="form-control">
                        <option value="">-- Sélectionner la situation familiale --</option>
                        <option value="عازب/عازبة">عازب/عازبة</option>
                        <option value="متزوج(ة)">متزوج(ة)</option>
                        <option value="مطلق(ة)">مطلق(ة)</option>  
                        <option value="ارمل(ة)">ارمل(ة)</option>    
                    </select>
                </div>
            </div>
    
            <input type="hidden" name="members[_index_][id_coop]" id="membre_cooperative_id">
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Niveau d'étude</label>
                    <select name="members[_index_][Niveau_etude]" class="form-control">
                        <option value="">-- Sélectionner le niveau d'étude --</option>
                        <option value="اعدادي">اعدادي</option>
                        <option value="ثانوي">ثانوي</option>
                        <option value="جامعي">جامعي</option>  
                        <option value="دراسات عليا">دراسات عليا</option>
                        <option value="تقني">تقني</option> 
                        <option value="بدون">بدون</option>           
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="Poste">Le poste</label>
                    <select name="members[_index_][Poste]" class="form-control poste-select" required>
                        <option value="">Sélectionner le poste</option>
                        <option value="رئيس">رئيس</option>
                        <option value="كاتب عام">كاتب عام</option>
                        <option value="امين مال">امين مال</option>
                        <option value="Autre">اخر</option>
                    </select>
                </div>
            </div>
    
            <div class="row autre-poste" style="display: none;">
                <div class="form-group col-md-6">
                    <label for="autrePoste">Précisez le poste</label>
                    <input type="text" name="members[_index_][autrePoste]" class="form-control">
                </div>
            </div>
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Telephonne">Téléphone</label>
                    <input type="text" name="members[_index_][Telephonne]" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Email">Email</label>
                    <input type="email" name="members[_index_][Email]" class="form-control" required>
                </div>
            </div>
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Couverture_sanitaire">Couverture sanitaire</label>
                    <select name="members[_index_][Couverture_sanitaire]" class="form-control poste-select" required>
                        <option value="">Sélectionner le choix</option>
                        <option value="يوجد">يوجد</option>
                        <option value="بدون">بدون</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="Num_affiliation_caisse">Numéro d'affiliation caisse</label>
                    <input type="text" name="members[_index_][Num_affiliation_caisse]" class="form-control" required>
                </div>
            </div>
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Metier">Métier</label>
                    <input type="text" name="members[_index_][Metier]" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Compétences</label>
                    <textarea name="members[_index_][Competences]" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </template>
    
    
    <template id="collaborator-template">
        <div class="member-form custom-shadow mb-4 border p-3 rounded-4">
            <h5 style="text-align:center;">Collaborateur <span class="collaborator-index"></span></h5>
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="NomFr">Nom (Français)</label>
                    <input type="text" name="collaborators[_index_][NomFr]" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <label for="NomAr">Nom (Arabe)</label>
                    <input type="text" name="collaborators[_index_][NomAr]" class="form-control" >
                </div>
            </div>
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="CNI">CIN</label>
                    <input type="text" name="collaborators[_index_][CIN]" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <label for="Date_naissance">Date de naissance</label>
                    <input type="date" name="collaborators[_index_][Date_naissance]" class="form-control" >
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Sexe</label>
                    <select name="collaborators[_index_][Sexe]" class="form-control" >
                        <option value="">-- Sélectionner le sexe --</option>
                        <option value="دكر">دكر</option>
                        <option value="انثى">انثى</option>  
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Situation familiale</label>
                    <select name="collaborators[_index_][Situation_familiale]" class="form-control" >
                        <option value="">-- Sélectionner la situation familiale --</option>
                        <option value="عازب/عازبة">عازب/عازبة</option>
                        <option value="متزوج(ة)">متزوج(ة)</option>
                        <option value="مطلق(ة)">مطلق(ة)</option>  
                        <option value="ارمل(ة)">ارمل(ة)</option>    
                    </select>
                </div>
            </div>
    
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Niveau d'étude</label>
                    <select name="collaborators[_index_][Niveau_etude]" class="form-control" >
                        <option value="">-- Sélectionner le niveau d'étude --</option>
                        <option value="اعدادي">اعدادي</option>
                        <option value="ثانوي">ثانوي</option>
                        <option value="جامعي">جامعي</option>  
                        <option value="دراسات عليا">دراسات عليا</option>
                        <option value="تقني">تقني</option> 
                        <option value="بدون">بدون</option>           
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="Poste">Le poste</label>
                    <select name="collaborators[_index_][Poste]" class="form-control poste-select" >
                        <option value="">Sélectionner le poste</option>
                        <option value="رئيس">رئيس</option>
                        <option value="كاتب عام">كاتب عام</option>
                        <option value="امين مال">امين مال</option>
                        <option value="Autre">اخر</option>
                    </select>
                </div>
            </div>
    
            <div class="row autre-poste" style="display: none;">
                <div class="form-group col-md-6">
                    <label for="autrePoste">Précisez le poste</label>
                    <input type="text" name="collaborators[_index_][autrePoste]" class="form-control">
                </div>
            </div>
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Telephonne">Téléphone</label>
                    <input type="text" name="collaborators[_index_][Telephonne]" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <label for="Email">Email</label>
                    <input type="email" name="collaborators[_index_][Email]" class="form-control" >
                </div>
            </div>
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Couverture_sanitaire">Couverture sanitaire</label>
                    <select name="collaborators[_index_][Couverture_sanitaire]" class="form-control" >
                        <option value="">Sélectionner le choix</option>
                        <option value="يوجد">يوجد</option>
                        <option value="بدون">بدون</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="Num_affiliation_caisse">Numéro d'affiliation caisse</label>
                    <input type="text" name="collaborators[_index_][Num_affiliation_caisse]" class="form-control" >
                </div>
            </div>
    
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Metier">Métier</label>
                    <input type="text" name="collaborators[_index_][Metier]" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <label>Compétences</label>
                    <textarea name="collaborators[_index_][Competences]" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </template>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3"  style="margin-top: 20px; width: 20%; height: 45px; border-radius: 10px;">
                Enregistrer
            </button>
        </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let collaboratorIndex = 0;
    const collaboratorTemplate = document.getElementById('collaborator-template');
    const collaboratorFormZone = document.getElementById('collaborator-form-zone');
    
    document.getElementById('add-collaborateur').addEventListener('click', function(e) {
        e.preventDefault();
        
        // Cloner le template
        const newCollaboratorForm = collaboratorTemplate.content.cloneNode(true);
        const collaboratorFormHtml = newCollaboratorForm.querySelector('.member-form');
        
        // Remplacer les _index_ par l'index actuel
        collaboratorFormHtml.innerHTML = collaboratorFormHtml.innerHTML.replace(/_index_/g, collaboratorIndex);
        
        // Mettre à jour le numéro du collaborateur
        collaboratorFormHtml.querySelector('.collaborator-index').textContent = collaboratorIndex + 1;
        
        // Ajouter le formulaire à la zone
        collaboratorFormZone.appendChild(collaboratorFormHtml);
        
        // Incrémenter l'index pour le prochain collaborateur
        collaboratorIndex++;
        
        // Gérer l'affichage du champ "autre poste"
        const posteSelects = document.querySelectorAll('.poste-select');
        posteSelects.forEach(select => {
            select.addEventListener('change', function() {
                const formGroup = this.closest('.member-form');
                const autrePosteDiv = formGroup.querySelector('.autre-poste');
                if (this.value === 'Autre') {
                    autrePosteDiv.style.display = 'block';
                } else {
                    autrePosteDiv.style.display = 'none';
                }
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    let memberIndex = 0;
    const memberTemplate = document.getElementById('member-template');
    const memberFormZone = document.getElementById('member-form-zone');
    
    document.getElementById('add-membre').addEventListener('click', function(e) {
        e.preventDefault();
        
        // Cloner le template
        const newMemberForm = memberTemplate.content.cloneNode(true);
        const memberFormHtml = newMemberForm.querySelector('.member-form');
        
        // Remplacer les _index_ par l'index actuel
        memberFormHtml.innerHTML = memberFormHtml.innerHTML.replace(/_index_/g, memberIndex);
        
        // Mettre à jour le numéro du membre
        memberFormHtml.querySelector('.member-index').textContent = memberIndex + 1;
        
        // Ajouter le formulaire à la zone
        memberFormZone.appendChild(memberFormHtml);
        
        // Incrémenter l'index pour le prochain membre
        memberIndex++;
        
        // Gérer l'affichage du champ "autre poste" si nécessaire
        const posteSelects = document.querySelectorAll('.poste-select');
        posteSelects.forEach(select => {
            select.addEventListener('change', function() {
                const formGroup = this.closest('.member-form');
                const autrePosteDiv = formGroup.querySelector('.autre-poste');
                if (this.value === 'Autre') {
                    autrePosteDiv.style.display = 'block';
                } else {
                    autrePosteDiv.style.display = 'none';
                }
            });
        });
    });
});







$(document).on('change', '.poste-select', function () {
        let autrePoste = $(this).closest('form').find('.autre-poste');
        if ($(this).val() === 'Autre') {
            autrePoste.slideDown();
        } else {
            autrePoste.slideUp();
        }
    });
$(document).on('change', 'input[name="DejaBeneficie"]', function () {
    if ($(this).val() === '1') {
        $('.nombre_beneficement').slideDown();
    } else {
        $('.nombre_beneficement').slideUp();
    }
});

//Secteur
$(document).on('change', '.secteur-select', function () {
        let autreSecteur = $(this).closest('form').find('.autre-secteur');
        if ($(this).val() === 'Autre') {
            autreSecteur.slideDown();
        } else {
            autreSecteur.slideUp();
        }
    });

//La nature du siege
$(document).on('change', '.siege-select', function () {
        let autreSiege = $(this).closest('form').find('.autre-siege');
        if ($(this).val() === 'Autre') {
            autreSiege.slideDown();
        } else {
            autreSiege.slideUp();
        }
    });
</script>

@endsection