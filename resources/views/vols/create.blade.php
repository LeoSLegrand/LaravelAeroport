<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Create Vol</title>
    </head>

    <body>
        <h1>Créé un Vol</h1>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form method="post" action="{{route('vols.store')}}">
            @csrf
            @method('post')

            <div>
                <label>Numero du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="numero" placeholder="Numéro Vol" />
                <br>
            </div>
            <br>

            <div>
                <label>Date de départ du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="date_depart" placeholder="Date départ" />
            </div>
            <br>

            <div>
                <label>Date d'arrivé du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="date_arivee" placeholder="Date arrivée" />
            </div>
            <br>

            <div>
                <label>Heure de départ du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="heure_depart" placeholder="Heure Départ" />
            </div>
                <br>
            
            <div>
                <label>Heure d'arrivée du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="heure_arivee" placeholder="Heure arrivée" />
            </div>
            <br>

            <div>
                <label>Nombre de place de l'avion &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="nombre_place" placeholder="Nombre Place" />
            </div>
            <br>

            <div>
                <input type="submit" value="Sauvegarde un nouveau vol"/>
            </div>
        </form>

        <br>
        <div>
            <a href="{{route('vols.index')}}">Retour à la liste de vol</a>
        </div>

    </body>
</html>
