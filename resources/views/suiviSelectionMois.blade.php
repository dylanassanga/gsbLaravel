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
<h2>Suivi des frais - Sélection du mois</h2>
<form method="POST" action="{{ route('chemin_suiviFrais') }}">
    @csrf
    <input type="hidden" name="idVisiteur" value="{{ $idVisiteurChoisi }}">
    <label>Choisir un mois :
        <select name="lstMois">
            @foreach($lesMois as $unMois)
                <option value="{{ $unMois['mois'] }}">
                    {{ $unMois['numMois'] . '/' . $unMois['numAnnee'] }}
                </option>
            @endforeach
        </select>
    </label>
    <input type="submit" value="Voir les frais">
</form>
@endsection