<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;

class etatController extends Controller
{
    function afficherEtats(){
        $visiteur = session('visiteur');
        if(!$visiteur || $visiteur['login'] != 'gestion'){
            return redirect()->route('chemin_connexion');
        }
        $lesVisiteurs = PdoGsb::getLesVisiteurs();
        return view('etats')
                    ->with('visiteur', $visiteur)
                    ->with('lesVisiteurs', $lesVisiteurs);
    }

    function produireEtat(Request $request){
        $visiteur = session('visiteur');
        if(!$visiteur || $visiteur['login'] != 'gestion'){
            return redirect()->route('chemin_connexion');
        }
        $typeEtat = $request['typeEtat'];
        $annee = $request['annee'] ?? null;
        $idVisiteur = $request['idVisiteur'] ?? null;
        $typeFrais = $request['typeFrais'] ?? null;

        $donnees = [];
        if($typeEtat == 'a'){
            $donnees = PdoGsb::getEtatParAnnee($annee);
        } elseif($typeEtat == 'b'){
            $donnees = PdoGsb::getEtatParVisiteur($idVisiteur);
        } elseif($typeEtat == 'c'){
            $donnees = PdoGsb::getEtatParTypeFrais($typeFrais);
        }

        // Génération du XML
       $xml = new \SimpleXMLElement('<etats/>');
        foreach($donnees as $ligne){
            $etat = $xml->addChild('etat');
            foreach($ligne as $cle => $valeur){
                $cle = preg_replace('/[^a-zA-Z0-9_]/', '_', $cle);
                if(is_numeric(substr($cle, 0, 1))){
                    $cle = '_' . $cle;
                }
                $etat->addChild($cle, htmlspecialchars((string)$valeur));
            }
        }

        $xmlContent = $xml->asXML();
        return response($xmlContent, 200)
                ->header('Content-Type', 'application/xml')
                ->header('Content-Disposition', 'attachment; filename="etat.xml"');
    }
}