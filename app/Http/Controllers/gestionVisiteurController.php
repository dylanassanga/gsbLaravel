<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;

class gestionVisiteurController extends Controller
{
    function listerVisiteurs(){
        $visiteur = session('visiteur');
        if(!$visiteur || $visiteur['login'] != 'gestion'){
            return redirect()->route('chemin_connexion');
        }
        $lesVisiteurs = PdoGsb::getLesVisiteurs();
        return view('listeVisiteurs')->with('lesVisiteurs', $lesVisiteurs)->with('visiteur', $visiteur);
    }

    function ajouterVisiteur(){
        $visiteur = session('visiteur');
        if(!$visiteur || $visiteur['login'] != 'gestion'){
            return redirect()->route('chemin_connexion');
        }
        return view('ajouterVisiteur')->with('visiteur', $visiteur);
    }

   function creerVisiteur(Request $request){
    $visiteur = session('visiteur');
    
    $visiteurExistant = PdoGsb::getUnVisiteur($request['id']);
    if($visiteurExistant){
        return view('ajouterVisiteur')
                ->with('visiteur', $visiteur)
                ->with('erreur', "Cet ID existe déjà !")
                ->with('donnees', $request->all());
    }

    PdoGsb::creerVisiteur(
        $request['id'], $request['nom'], $request['prenom'], 
        $request['login'], $request['mdp'], $request['adresse'], 
        $request['cp'], $request['ville'], $request['dateEmbauche']
    );
    return redirect()->route('chemin_listeVisiteurs');
}

    function modifierVisiteur($id){
        $visiteur = session('visiteur');
        if(!$visiteur || $visiteur['login'] != 'gestion'){
            return redirect()->route('chemin_connexion');
        }
        $unVisiteur = PdoGsb::getUnVisiteur($id);
        return view('modifierVisiteur')->with('unVisiteur', $unVisiteur)->with('visiteur', $visiteur);
    }

    function sauvegarderVisiteur(Request $request){
        $visiteur = session('visiteur');
        PdoGsb::majVisiteur($request['id'], $request['nom'], $request['prenom'], $request['login'], $request['mdp'], $request['adresse'], $request['cp'], $request['ville'], $request['dateEmbauche']);
        return redirect()->route('chemin_listeVisiteurs');
    }
}