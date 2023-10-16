<!DOCTYPE html>
<html>
    <head>
        <title>Index Vols</title>
    </head>

    <body>
        <h1>Vols</h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{route('vols.create')}}">Ajouter un vol</a>
                <div>&nbsp;&nbsp;</div>
                <a href="{{route('aeroports.main')}}">Retour à la page principal</a>
            </div>
            <br>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Numéro Vol</th>
                    <th>Date Départ</th>
                    <th>Date Arrivée</th>
                    <th>Heure Départ</th>
                    <th>Heure Arrivée</th>
                    <th>Nombre Place</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($vols as $vols)
                    <tr>
                        <td>{{$vols->id}}</td>
                        <td>{{$vols->numero}}</td>
                        <td>{{$vols->date_depart}}</td>
                        <td>{{$vols->date_arivee}}</td>
                        <td>{{$vols->heure_depart}}</td>
                        <td>{{$vols->heure_arivee}}</td>
                        <td>{{$vols->nombre_place}}</td>
                        <td>
                            <a href="{{route('vols.edit', ['vols' => $vols])}}">Edit</a>
                        </td>
                        <td>
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
        </div>
    </body>
</html>
