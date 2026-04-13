@extends ('modeles/visiteur')
@section('menu')
<div id="menuGauche">
    <ul id="menuList">
        <li>
            <strong>Bonjour {{ $visiteur['nom'] . ' ' . $visiteur['prenom'] }}</strong>
        </li>
        <li class="smenu">
            <a href="{{ route('chemin_listeVisiteurs') }}">Gestion des visiteurs</a>
        </li>
        <li class="smenu">
            <a href="{{ route('chemin_suiviFreais') }}">Suivi des frais</a>
        </li>
        <li class="smenu">
            <a href="{{ route('chemin_deconnexion') }}">Déconnexion</a>
        </li>
    </ul>
</div>
@endsection

@section('contenu1')
<h2>Suivi des frais</h2>
<p><strong>Mois :</strong> {{ substr($leMois, 4, 2) . '/' . substr($leMois, 0, 4) }}</p>
<p><strong>État :</strong> {{ $lesInfosFicheFrais['libEtat'] }}</p>
<p><strong>Montant validé :</strong> {{ $lesInfosFicheFrais['montantValide'] }} €</p>
<p><strong>Nombre de justificatifs :</strong> {{ $lesInfosFicheFrais['nbJustificatifs'] }}</p>
<p><strong>Date de modification :</strong> {{ $lesInfosFicheFrais['dateModif'] }}</p>

<h3>Frais forfait</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Frais</th>
        <th>Quantité</th>
    </tr>
    @foreach($lesFraisForfait as $unFrais)
    <tr>
        <td>{{ $unFrais['libelle'] }}</td>
        <td>{{ $unFrais['quantite'] }}</td>
    </tr>
    @endforeach
</table>

<br>
<a href="{{ route('chemin_suiviFreais') }}">Retour</a>
@endsection