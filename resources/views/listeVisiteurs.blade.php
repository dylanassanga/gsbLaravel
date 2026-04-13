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
<h2>Liste des visiteurs</h2>
<a href="{{ route('chemin_ajouterVisiteur') }}">Ajouter un visiteur</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Login</th>
        <th>Adresse</th>
        <th>CP</th>
        <th>Ville</th>
        <th>Date embauche</th>
        <th>Action</th>
    </tr>
    @foreach($lesVisiteurs as $unVisiteur)
    <tr>
        <td>{{ $unVisiteur['id'] }}</td>
        <td>{{ $unVisiteur['nom'] }}</td>
        <td>{{ $unVisiteur['prenom'] }}</td>
        <td>{{ $unVisiteur['login'] }}</td>
        <td>{{ $unVisiteur['adresse'] }}</td>
        <td>{{ $unVisiteur['cp'] }}</td>
        <td>{{ $unVisiteur['ville'] }}</td>
        <td>{{ $unVisiteur['dateEmbauche'] }}</td>
        <td>
            <a href="{{ route('chemin_modifierVisiteur', $unVisiteur['id']) }}">Modifier</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection