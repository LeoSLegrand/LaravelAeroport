    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
            <div>
                {{ __('Vous naviguez en') }} [{{ App::getLocale() }}]
                <a href="{{ route('language.change', ['code_iso' => 'fr']) }}">{{ __('French') }}</a>
                <a href="{{ route('language.change', ['code_iso' => 'en']) }}">{{ __('English') }}</a>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
        
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();" style="float: right; padding-right: 40px;" class="btn btn-danger">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </head>

        <body style="text-align: center">
            <br><br>
            <h1 style="text-align: center"><strong>{{ __('Liste des vols')}}</strong></h1>
            <br>
            <table  class="table table-striped" border="1" style="margin-left: auto; margin-right: auto">
                <tr>
                    <th>{{ __('Numéro Vol') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Compagnie') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Nombre place') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Date départ') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Date arivée') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Heure départ') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Heure arrivée') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Aeroport départ') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Aeroport arivée') }}</th>
                </tr>
                @foreach($vols as $vols)
                <tr>
                    <th style="text-align: center;">{{$vols['numero'] }}</th>
                    <th style="text-align: center;">{{$vols['compagnies_id'] }}</th>
                    <th style="text-align: center;">{{$vols['nombre_place'] }}</th>
                    <th style="text-align: center;">{{$vols['date_depart'] }}</th>
                    <th style="text-align: center;">{{$vols['date_arivee'] }}</th>
                    <th style="text-align: center;">{{$vols['heure_depart'] }}</th>
                    <th style="text-align: center;">{{$vols['heure_arivee'] }}</th>
                    <th style="text-align: center;">{{$vols['aeroport_id_depart'] }}</th>
                    <th style="text-align: center;">{{$vols['aeroport_id_arivee'] }}</th>
                </tr>
                @endforeach
            </table>

            <br><br><br><br>
            <h1 style="text-align: center"><strong>{{ __('Nombre de vols par mois')}}</strong></h1>
            <br>
            <table  class="table table-striped" border="1" style="margin-left: auto; margin-right: auto">
                <tr>
                    <th>{{ __('Janvier') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Fevrier') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Mars') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Avril') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Mai') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Juin') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Juillet') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Aout') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Septembre') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Octobre') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Novembre') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Decembre') }}     &nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <th>{{ \App\Models\Vols::nbVolMois(1) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(2) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(3) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(4) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(5) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(6) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(7) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(8) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(9) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(10) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(11) }}</th>
                    <th>{{ \App\Models\Vols::nbVolMois(12) }}</th>
                </tr>
            </table>

            <br><br>
            <div>
                @auth
                <a href="/aeroport/index" class="btn btn-secondary">{{ __('Gestion des Aéroports') }}</a>
                <div>&nbsp;&nbsp;</div>
                @endauth
            
                @auth
                <a href="/company/index" class="btn btn-secondary">{{ __('Gestion des Compagnies') }}</a>
                <div>&nbsp;&nbsp;</div>

                <a href="/vol/index" class="btn btn-secondary">{{ __('Gestion des Vols') }}</a>
                @endauth
            </div>
            <br><br>
            

        </body>
    </html>
