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
@if(isset($erreur))
    <p style="color:red;">{{ $erreur }}</p>
@endif
<h2>Ajouter un visiteur</h2>
<form method="POST" action="{{ route('chemin_creerVisiteur') }}">
    @csrf
    <<label>ID : <input type="text" name="id" value="{{ $donnees['id'] ?? '' }}" required></label><br>
<label>Nom : <input type="text" name="nom" value="{{ $donnees['nom'] ?? '' }}" required></label><br>
<label>Prénom : <input type="text" name="prenom" value="{{ $donnees['prenom'] ?? '' }}" required></label><br>
<label>Login : <input type="text" name="login" value="{{ $donnees['login'] ?? '' }}" required></label><br>
<label>Mot de passe : <input type="text" name="mdp" value="{{ $donnees['mdp'] ?? '' }}" required></label><br>
<label>Adresse : <input type="text" name="adresse" value="{{ $donnees['adresse'] ?? '' }}" required></label><br>
<label>CP : <input type="text" name="cp" value="{{ $donnees['cp'] ?? '' }}" required></label><br>
<label>Ville : <input type="text" name="ville" value="{{ $donnees['ville'] ?? '' }}" required></label><br>
<label>Date embauche : <input type="date" name="dateEmbauche" value="{{ $donnees['dateEmbauche'] ?? '' }}" required></label><br><br>
<input type="submit" value="Ajouter">
<a href="{{ route('chemin_listeVisiteurs') }}">Annuler</a>
</form>
@endsection