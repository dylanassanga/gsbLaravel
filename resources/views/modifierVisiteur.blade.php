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
            <a href="{{ route('chemin_deconnexion') }}">Déconnexion</a>
        </li>
    </ul>
</div>
@endsection

@section('contenu1')
<h2>Modifier un visiteur</h2>
<form method="POST" action="{{ route('chemin_sauvegarderVisiteur') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $unVisiteur['id'] }}">
    <label>Nom : <input type="text" name="nom" value="{{ $unVisiteur['nom'] }}" required></label><br>
    <label>Prénom : <input type="text" name="prenom" value="{{ $unVisiteur['prenom'] }}" required></label><br>
    <label>Login : <input type="text" name="login" value="{{ $unVisiteur['login'] }}" required></label><br>
    <label>Mot de passe : <input type="text" name="mdp" value="{{ $unVisiteur['mdp'] }}" required></label><br>
    <label>Adresse : <input type="text" name="adresse" value="{{ $unVisiteur['adresse'] }}" required></label><br>
    <label>CP : <input type="text" name="cp" value="{{ $unVisiteur['cp'] }}" required></label><br>
    <label>Ville : <input type="text" name="ville" value="{{ $unVisiteur['ville'] }}" required></label><br>
    <label>Date embauche : <input type="date" name="dateEmbauche" value="{{ $unVisiteur['dateEmbauche'] }}" required></label><br><br>
    <input type="submit" value="Sauvegarder">
    <a href="{{ route('chemin_listeVisiteurs') }}">Annuler</a>
</form>
@endsection