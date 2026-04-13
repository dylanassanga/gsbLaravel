<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;

class suiviFraisController extends Controller
{
    function selectionnerVisiteur(){
        $visiteur = session('visiteur');
        if(!$visiteur || $visiteur['login'] != 'gestion'){
            return redirect()->route('chemin_connexion');
        }
        $lesVisiteurs = PdoGsb::getLesVisiteurs();
        return view('suiviSelectionVisiteur')
                    ->with('lesVisiteurs', $lesVisiteurs)
                    ->with('visiteur', $visiteur);
    }

    function selectionnerMois(Request $request){
        $visiteur = session('visiteur');
        if(!$visiteur || $visiteur['login'] != 'gestion'){
            return redirect()->route('chemin_connexion');
        }
        $idVisiteurChoisi = $request['lstVisiteurs'];
        $lesMois = PdoGsb::getLesMoisDisponibles($idVisiteurChoisi);
        $lesVisiteurs = PdoGsb::getLesVisiteurs();
        return view('suiviSelectionMois')
                    ->with('lesVisiteurs', $lesVisiteurs)
                    ->with('idVisiteurChoisi', $idVisiteurChoisi)
                    ->with('lesMois', $lesMois)
                    ->with('visiteur', $visiteur);
    }

    function voirFrais(Request $request){
        $visiteur = session('visiteur');
        if(!$visiteur || $visiteur['login'] != 'gestion'){
            return redirect()->route('chemin_connexion');
        }
        $idVisiteurChoisi = $request['idVisiteur'];
        $leMois = $request['lstMois'];
        $lesFraisForfait = PdoGsb::getLesFraisForfait($idVisiteurChoisi, $leMois);
        $lesInfosFicheFrais = PdoGsb::getLesInfosFicheFrais($idVisiteurChoisi, $leMois);
        return view('suiviFrais')
                    ->with('idVisiteurChoisi', $idVisiteurChoisi)
                    ->with('leMois', $leMois)
                    ->with('lesFraisForfait', $lesFraisForfait)
                    ->with('lesInfosFicheFrais', $lesInfosFicheFrais)
                    ->with('visiteur', $visiteur);
    }
}