<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SecteurController;
use App\Http\Controllers\SubventionController;
use App\Http\Controllers\VersementController;
use App\Http\Controllers\FolderSubvController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FolderCoopController;
use App\Http\Controllers\DemandeSubventionController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\CollaborateurController;

use App\Http\Controllers\DocumentJointController ;

// Routes resource pour Folder
Route::resource('folder_subvs', FolderSubvController::class);

// Routes resource pour Subvention
Route::resource('subventions', SubventionController::class);

// Routes resource pour Login
//Route::resource('logins', LoginController::class);
Route::GET('/login', [LoginController::class,'authentification_page'])->name('login.authentification');
Route::POST('/login', [LoginController::class,'login'])->name('login.verification');
Route::GET('/logout', [LoginController::class,'logout'])->name('login.logout');
Route::GET('/Profil', [LoginController::class,'show'])->name('profil');



// Routes resource pour Membre
Route::resource('membres', MembreController::class);

// Routes resource pour Province
Route::resource('provinces', ProvinceController::class);

// Routes resource pour Cooperative
Route::resource('cooperatives', CooperativeController::class);

// Routes resource pour Categorie
Route::resource('categories', CategorieController::class);

// Routes resource pour FolderCoop
Route::resource('folder_coops', FolderCoopController::class);

// Routes resource pour DemandeSubvention
Route::resource('demande_subventions', DemandeSubventionController::class);

// Routes resource pour Commune
Route::resource('communes', CommuneController::class);

// Routes resource pour Collaborateur
Route::resource('collaborateurs', CollaborateurController::class);

// Routes resource pour Secteur
Route::resource('secteurs', SecteurController::class);

// Routes resource pour Subvention
Route::resource('subventions', SubventionController::class);

// Routes resource pour Versement
Route::resource('versements', VersementController::class);


Route::resource('documents', DocumentJointController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
});
