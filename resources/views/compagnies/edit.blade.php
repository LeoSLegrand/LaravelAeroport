<!DOCTYPE html>
<html>
    <head>
        <title>Edit Compagnie</title>
    </head>

    <body>
        <h1>Editer une compagnie</h1>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form method="post" action="{{route('compagnies.update', ['compagnies' => $compagnies])}}">
            @csrf
            @method('put')

            <div>
                <label>Nom de la compagnie &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="nom_compagnie" placeholder="Nom Compagnie" value="{{$compagnies->nom_compagnie}}"/>
                <br>
            </div>
            <br>

            <div>
                <label>Pays de la Compagnie &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="pays" placeholder="Pays" value="{{$compagnies->pays}}"/>
            </div>
            <br>

            <div>
                <input type="submit" value="Editer les paramètres"/>
            </div>
        </form>

        <br>
        <div>
            <a href="{{route('compagnies.index')}}">Retour à la liste des compagnies</a>
        </div>

    </body>
</html>
