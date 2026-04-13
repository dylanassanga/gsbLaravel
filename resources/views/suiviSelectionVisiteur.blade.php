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
<h2>Suivi des frais - Sélection du visiteur</h2>
<form method="POST" action="{{ route('chemin_suiviSelectionMois') }}">
    @csrf
    <label>Choisir un visiteur :
        <select name="lstVisiteurs">
            @foreach($lesVisiteurs as $unVisiteur)
                <option value="{{ $unVisiteur['id'] }}">
                    {{ $unVisiteur['nom'] . ' ' . $unVisiteur['prenom'] }}
                </option>
            @endforeach
        </select>
    </label>
    <input type="submit" value="Suivant">
</form>
@endsection