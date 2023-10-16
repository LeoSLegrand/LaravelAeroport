<!DOCTYPE html>
<html>
    <head>
        <title>Create Compagnie</title>
    </head>

    <body>
        <h1>Créé une compagnie</h1>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form method="post" action="{{route('compagnies.store')}}">
            @csrf
            @method('post')

            <div>
                <label>Nom de la compagnie &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="nom_compagnie" placeholder="Nom Compagnie" />
                <br>
            </div>
            <br>

            <div>
                <label>Pays de la compagnie &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="pays" placeholder="Pays Compagnie" />
            </div>
            <br>

            <div>
                <input type="submit" value="Sauvegarde une nouvelle compagnie"/>
            </div>
        </form>

        <br>
        <div>
            <a href="{{route('compagnies.index')}}">Retour à la liste compagnie</a>
        </div>

    </body>
</html>
