<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>{{ __('Index des Aeroports') }}</title>
    </head>

    <body style="text-align: center">
        <h1><strong>{{ __('Aeroports') }}</strong></h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{route('aeroports.create')}}" class="btn btn-primary">{{ __('Ajouter un aeroport') }}</a>
                <div>&nbsp;&nbsp;</div>
                <a href="{{route('aeroports.main')}}" class="btn btn-secondary">{{ __('Retour à la page principal') }}</a>
            </div>
            <br>
            <table class="table table-striped" border="1" style="margin-left: auto; margin-right: auto">
                <tr>
                    <th>Id &nbsp;&nbsp;</th>
                    <th>{{ __('Nom des Aeroports') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Ville') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Code Aeroports') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Nombre de Pistes') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Editer') }} &nbsp;&nbsp;</th>
                    <th>{{ __('Supprimer') }} &nbsp;&nbsp;</th>
                </tr>
                @foreach($aeroports as $aeroports)
                    <tr>
                        <td style="text-align: center;">{{$aeroports->id}}</td>
                        <td style="text-align: center;">{{$aeroports->nom_aeroport}}</td>
                        <td style="text-align: center;">{{$aeroports->ville_aeroport}}</td>
                        <td style="text-align: center;">{{$aeroports->code}}</td>
                        <td style="text-align: center;">{{$aeroports->nombre_piste}}</td>
                        <td style="text-align: center;">
                            <a href="{{route('aeroports.edit', ['aeroports' => $aeroports])}}" class="btn btn-primary">{{ __('Editer') }}</a>
                        </td>
                        <td style="text-align: center;">
                            {{-- <form method="post" action="{{route('aeroports.destroy'), ['aeroports' => $aeroports]}}"> --}}
                            <form method="post" action="{{route('aeroports.destroy', [$aeroports])}}">
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
