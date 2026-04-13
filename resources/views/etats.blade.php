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
            <a href="{{ route('chemin_etats') }}">Produire des états</a>
        </li>
        <li class="smenu">
            <a href="{{ route('chemin_deconnexion') }}">Déconnexion</a>
        </li>
    </ul>
</div>
@endsection

@section('contenu1')
<h2>Produire des états</h2>

<form method="POST" action="{{ route('chemin_produireEtat') }}">
    @csrf

    <p>
        <input type="radio" name="typeEtat" value="a" checked> 
        <strong>a)</strong> Pour une année, tous les frais par visiteur<br>
        <label>Année : <input type="text" name="annee" value="2021" size="4"></label>
    </p>

    <p>
        <input type="radio" name="typeEtat" value="b">
        <strong>b)</strong> Pour un visiteur, tous les frais par mois<br>
        <label>Visiteur :
            <select name="idVisiteur">
                @foreach($lesVisiteurs as $unVisiteur)
                    <option value="{{ $unVisiteur['id'] }}">
                        {{ $unVisiteur['nom'] . ' ' . $unVisiteur['prenom'] }}
                    </option>
                @endforeach
            </select>
        </label>
    </p>

    <p>
        <input type="radio" name="typeEtat" value="c">
        <strong>c)</strong> Pour un type de frais, tous les montants par mois et par visiteur<br>
        <label>Type de frais :
            <select name="typeFrais">
                <option value="ETP">Forfait Etape</option>
                <option value="KM">Frais Kilométrique</option>
                <option value="NUI">Nuitée Hôtel</option>
                <option value="REP">Repas Restaurant</option>
            </select>
        </label>
    </p>

    <input type="submit" value="Exporter en XML">
</form>
@endsection