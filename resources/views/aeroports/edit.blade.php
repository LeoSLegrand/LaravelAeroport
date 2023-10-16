<!DOCTYPE html>
<html>
    <head>
        <title>Edit Aeroport</title>
    </head>

    <body>
        <h1>Editer un Aeroport</h1>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form method="post" action="{{route('aeroports.update', ['aeroports' => $aeroports])}}">
            @csrf
            @method('put')

            <div>
                <label>Nom de l'aeroport &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="nom_aeroport" placeholder="Nom" value="{{$aeroports->nom_aeroport}}"/>
                <br>
            </div>
            <br>

            <div>
                <label>Ville de l'aeroport &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="ville_aeroport" placeholder="Ville" value="{{$aeroports->ville_aeroport}}"/>
            </div>
            <br>

            <div>
                <label>Code de l'aeroport &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="code" placeholder="Code" value="{{$aeroports->code}}"/>
            </div>
            <br>

            <div>
                <label>Nombre de piste de l'aeroport &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="nombre_piste" placeholder="Nombre Piste" value="{{$aeroports->nombre_piste}}"/>
            </div>
                <br>

            <div>
                <input type="submit" value="Editer les paramètres"/>
            </div>
        </form>

        <br>
        <div>
            <a href="{{route('aeroports.index')}}">Retour à la liste Aeroport</a>
        </div>

    </body>
</html>
