<!DOCTYPE html>
<html>
    <head>
        <title>Index Compagnie</title>
    </head>

    <body>
        <h1>Compagnies</h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{route('compagnies.create')}}">Ajouter une compagnie</a>
                <div>&nbsp;&nbsp;</div>
                <a href="{{route('aeroports.main')}}">Retour à la page principal</a>
            </div>
            <br>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Nom Compagnie</th>
                    <th>Pays Compagnie</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($compagnies as $compagnies)
                    <tr>
                        <td>{{$compagnies->id}}</td>
                        <td>{{$compagnies->nom_compagnie}}</td>
                        <td>{{$compagnies->pays}}</td>
                        <td>
                            <a href="{{route('compagnies.edit', ['compagnies' => $compagnies])}}">Edit</a>
                        </td>
                        <td>
                            {{-- <form method="post" action="{{route('compagnies.destroy'), ['compagnies' => $compagnies]}}"> --}}
                            <form method="post" action="{{route('compagnies.destroy', [$compagnies])}}">
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
