<?php

use Illuminate\Support\Facades\Route;
// Chemin des contrôleurs
use App\Http\Controllers\etatController;
use App\Http\Controllers\suiviFraisController;
use App\Http\Controllers\connexionController;
use App\Http\Controllers\etatFraisController;
use App\Http\Controllers\gererFraisController;
use App\Http\Controllers\gestionVisiteurController;
// Création des groupes de routes
Route::controller(connexionController::class)->group(function () {
    Route::get('/', 'connecter')->name('chemin_connexion');
    Route::post('/', 'valider')->name('chemin_valider');
    Route::get('/deconnexion', 'deconnecter')->name('chemin_deconnexion');
});

Route::controller(etatFraisController::class)->group(function () {
    Route::get('/selectionMois', 'selectionnerMois')->name('chemin_selectionMois');
    Route::post('/listeFrais', 'voirFrais')->name('chemin_listeFrais');
});

Route::controller(gererFraisController::class)->group(function () {
    Route::get('/gererFrais', 'saisirFrais')->name('chemin_gestionFrais');
    Route::post('/sauvegarderFrais', 'sauvegarderFrais')->name('chemin_sauvegardeFrais');
});

Route::controller(gestionVisiteurController::class)->group(function () {
    Route::get('/listeVisiteurs', 'listerVisiteurs')->name('chemin_listeVisiteurs');
    Route::get('/modifierVisiteur/{id}', 'modifierVisiteur')->name('chemin_modifierVisiteur');
    Route::post('/sauvegarderVisiteur', 'sauvegarderVisiteur')->name('chemin_sauvegarderVisiteur');
    Route::get('/ajouterVisiteur', 'ajouterVisiteur')->name('chemin_ajouterVisiteur');
    Route::post('/creerVisiteur', 'creerVisiteur')->name('chemin_creerVisiteur');
});

Route::controller(suiviFraisController::class)->group(function () {
    Route::get('/suiviFreais', 'selectionnerVisiteur')->name('chemin_suiviFreais');
    Route::post('/suiviSelectionMois', 'selectionnerMois')->name('chemin_suiviSelectionMois');
    Route::post('/suiviFrais', 'voirFrais')->name('chemin_suiviFrais');
});

Route::controller(etatController::class)->group(function () {
    Route::get('/etats', 'afficherEtats')->name('chemin_etats');
    Route::post('/produireEtat', 'produireEtat')->name('chemin_produireEtat');
});