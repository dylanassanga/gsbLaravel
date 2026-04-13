@extends ('modeles/visiteur')
    @section('menu')
        <div id="menuGauche">
            <div id="infosUtil"></div>  
            <ul id="menuList">
                <li>
                    <strong>Bonjour {{ $visiteur['nom'] . ' ' . $visiteur['prenom'] }}</strong>
                </li>

                @if($visiteur['login'] == 'gestion')
                    {{-- Menu gestionnaire --}}
                    <li class="smenu">
                        <a href="{{ route('chemin_suiviFreais') }}">Suivi des frais</a>
                    </li>
                    <li class="smenu">
                        <a href="{{ route('chemin_listeVisiteurs') }}">Gestion des visiteurs</a>
                    </li>
                    <li class="smenu">
                        <a href="{{ route('chemin_etats') }}">Produire des états</a>
                    </li>
                @else
                    {{-- Menu visiteur --}}
                    <li class="smenu">
                        <a href="{{ route('chemin_gestionFrais') }}">Saisie fiche de frais</a>
                    </li>
                    <li class="smenu">
                        <a href="{{ route('chemin_selectionMois') }}">Mes fiches de frais</a>
                    </li>
                @endif

                <li class="smenu">
                    <a href="{{ route('chemin_deconnexion') }}">Déconnexion</a>
                </li>
            </ul>
        </div>
    @endsection