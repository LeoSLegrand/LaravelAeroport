<!DOCTYPE html>
<html>
    <head>
        <title>Create Aeroport</title>
    </head>

    <body>
        <h1>Créé un Aeroport</h1>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form method="post" action="{{route('aeroports.store')}}">
            @csrf
            @method('post')

            <div>
                <label>Nom de l'aeroport &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="nom_aeroport" placeholder="Nom" />
                <br>
            </div>
            <br>

            <div>
                <label>Ville de l'aeroport &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="ville_aeroport" placeholder="Ville" />
            </div>
            <br>

            <div>
                <label>Code de l'aeroport &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="code" placeholder="Code" />
            </div>
            <br>

            <div>
                <label>Nombre de piste de l'aeroport &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="nombre_piste" placeholder="Nombre Piste" />
            </div>
                <br>

            <div>
                <input type="submit" value="Sauvegarde un nouvel aeroport"/>
            </div>
        </form>

        <br>
        <div>
            <a href="{{route('aeroports.index')}}">Retour à la liste Aeroport</a>
        </div>

    </body>
</html>
