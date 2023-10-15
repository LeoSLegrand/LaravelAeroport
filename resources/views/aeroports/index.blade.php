<!DOCTYPE html>
<html>
    <head>
        <title>Index Aeroport</title>
    </head>

    <body>
        <h1>Aeroports</h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{route('aeroports.create')}}">Ajouter un aeroport</a>
            </div>
            <br>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Nom Aeroport</th>
                    <th>Ville</th>
                    <th>Ville</th>
                    <th>Nombre de Piste</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($aeroports as $aeroports)
                    <tr>
                        <td>{{$aeroports->id}}</td>
                        <td>{{$aeroports->nom_aeroport}}</td>
                        <td>{{$aeroports->ville_aeroport}}</td>
                        <td>{{$aeroports->code}}</td>
                        <td>{{$aeroports->nombre_piste}}</td>
                        <td>
                            <a href="{{route('aeroports.edit', ['aeroports' => $aeroports])}}">Edit</a>
                        </td>
                        <td>
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
        </div>
    </body>
</html>
