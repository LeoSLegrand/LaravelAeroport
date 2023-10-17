<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <div>
            {{ __('Vous naviguez en') }} [{{ App::getLocale() }}] <!-- /*[{{ session('locale') }}]*/ --> {{Config::get('languages')[App::getLocale()]['flag-icon']}}
            <a href="{{ route('language.change', ['code_iso' => 'fr']) }}">{{ __('French') }} </a>
            <a href="{{ route('language.change', ['code_iso' => 'en']) }}">{{ __('English') }}</a>
          </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
    
            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();" style="float: right; padding-right: 20px;">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </head>

    <body style="text-align: center">
        <br><br>
        <h1 style="text-align: center">Liste des vols</h1>
        <br>
        <table style="margin-left: auto; margin-right: auto">
            <tr>
                <td>Numéro Vol &nbsp;&nbsp;</td>
                <td>Compagnie &nbsp;&nbsp;</td>
                <td>Nombre place &nbsp;&nbsp;</td>
                <td>Date départ &nbsp;&nbsp;</td>
                <td>Date arivée &nbsp;&nbsp;</td>
                <td>Heure départ &nbsp;&nbsp;</td>
                <td>Heure arivée &nbsp;&nbsp;</td>
                <td>Aeroport départ &nbsp;&nbsp;</td>
                <td>Aeroport arivée</td>
            </tr>
            @foreach($vols as $vols)
            <tr>
                <td style="text-align: center;">{{$vols['numero']}}</td>
                <td style="text-align: center;">{{$vols['compagnies_id']}}</td>
                <td style="text-align: center;">{{$vols['nombre_place']}}</td>
                <td style="text-align: center;">{{$vols['date_depart']}}</td>
                <td style="text-align: center;">{{$vols['date_arivee']}}</td>
                <td style="text-align: center;">{{$vols['heure_depart']}}</td>
                <td style="text-align: center;">{{$vols['heure_arivee']}}</td>
                <td style="text-align: center;">{{$vols['aeroport_id_depart']}}</td>
                <td style="text-align: center;">{{$vols['aeroport_id_arivee']}}</td>
            </tr>
            @endforeach
        </table>

        <br><br><br><br>
        <h1 style="text-align: center">Tableau affichage nombre de vol par mois</h1>
        <br>
        <table style="margin-left: auto; margin-right: auto">
            <tr>
                <th>Janvier &nbsp;&nbsp;</th>
                <th>Fevrier &nbsp;&nbsp;</th>
                <th>Mars &nbsp;&nbsp;</th>
                <th>Avril &nbsp;&nbsp;</th>
                <th>Mai &nbsp;&nbsp;</th>
                <th>Juin &nbsp;&nbsp;</th>
                <th>Juillet &nbsp;&nbsp;</th>
                <th>Aout &nbsp;&nbsp;</th>
                <th>Septembre &nbsp;&nbsp;</th>
                <th>Octobre &nbsp;&nbsp;</th>
                <th>Novembre &nbsp;&nbsp;</th>
                <th>Decembre &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td>{{ \App\Models\Vols::nbVolMois(1) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(2) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(3) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(4) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(5) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(6) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(7) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(8) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(9) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(10) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(11) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(12) }}</td>
            </tr>
        </table>

        <br><br>
        @auth
        <a href="/aeroport/index">Lien vers la gestion des aeroports</a>
        <div>&nbsp;&nbsp;</div>
        @endauth
      
        @auth
        <a href="/company/index">Lien vers la gestion des companies</a>
        <div>&nbsp;&nbsp;</div>
        <a href="/vol/index">Lien vers la gestion des vols</a>
        @endauth
        <br><br>

    </body>
</html>
