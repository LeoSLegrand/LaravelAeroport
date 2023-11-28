<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>{{ __('Index des Vols') }}</title>
    </head>

    <body style="text-align: center">
        <h1><strong>{{ __('Vols') }}</strong></h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{route('vols.create')}}" class="btn btn-primary">{{ __('Ajouter un vol') }}</a>
                <div>&nbsp;&nbsp;</div>
                <a href="{{route('aeroports.main')}}" class="btn btn-secondary">{{ __('Retour à la page principal') }}</a>
            </div>
            <br>
            <table class="table table-striped" border="1" style="margin-left: auto; margin-right: auto">
                <tr>
                    <th>Id &nbsp;&nbsp;</th>
                    <th>{{ __('Numéro Vol') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Date Départ') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Date Arrivée') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Heure Départ') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Heure Arrivée') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Nombre Places') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Editer') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Supprimer') }} &nbsp;&nbsp;</th>
                </tr>
                @foreach($vols as $vols)
                    <tr>
                        <td style="text-align: center;">{{$vols->id}}</td>
                        <td style="text-align: center;">{{$vols->numero}}</td>
                        <td style="text-align: center;">{{$vols->date_depart}}</td>
                        <td style="text-align: center;">{{$vols->date_arivee}}</td>
                        <td style="text-align: center;">{{$vols->heure_depart}}</td>
                        <td style="text-align: center;">{{$vols->heure_arivee}}</td>
                        <td style="text-align: center;">{{$vols->nombre_place}}</td>
                        <td style="text-align: center;">
                            <a href="{{route('vols.edit', ['vols' => $vols])}}" class="btn btn-primary">{{ __('Editer') }}</a>
                        </td>
                        <td style="text-align: center;">
                            {{-- <form method="post" action="{{route('vols.destroy'), ['vols' => $vols]}}"> --}}
                            <form method="post" action="{{route('vols.destroy', [$vols])}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        <br><br>

        </div>
    </body>
</html>
