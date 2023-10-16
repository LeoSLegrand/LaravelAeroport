<!DOCTYPE html>
<html>
    <head>
        <title>Edit Vol</title>
    </head>

    <body>
        <h1>Editer un Vol</h1>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form method="post" action="{{route('vols.update', ['vols' => $vols])}}">
            @csrf
            @method('put')

            <div>
                <label>Numero du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="numero" placeholder="Numéro Vol" value="{{$vols->numero}}"/>
                <br>
            </div>
            <br>

            <div>
                <label>Date de départ du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="date_depart" placeholder="Date départ" value="{{$vols->date_depart}}"/>
            </div>
            <br>

            <div>
                <label>Date d'arrivé du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="date_arivee" placeholder="Date arrivée" value="{{$vols->date_arivee}}"/>
            </div>
            <br>

            <div>
                <label>Heure de départ du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="heure_depart" placeholder="Heure Départ" value="{{$vols->heure_depart}}"/>
            </div>
                <br>
            
            <div>
                <label>Heure d'arrivée du vol &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="heure_arivee" placeholder="Heure arrivée" value="{{$vols->heure_arivee}}"/>
            </div>
            <br>

            <div>
                <label>Nombre de place de l'avion &nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="nombre_place" placeholder="Nombre Place" value="{{$vols->nombre_place}}"/>
            </div>
            <br>

            <div>
                <input type="submit" value="Editer les paramètres"/>
            </div>
        </form>

        <br>
        <div>
            <a href="{{route('vols.index')}}">Retour à la liste de vols</a>
        </div>

    </body>
</html>
