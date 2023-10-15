<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <h1>Liste des vols</h1>

        <table>
            <tr>
                <td>Numéro Vol</td>
                <td>Compagnie</td>
                <td>Nombre place</td>
                <td>Date départ</td>
                <td>Date arivée</td>
                <td>Heure départ</td>
                <td>Heure arivée</td>
                <td>Aeroport départ</td>
                <td>Aeroport arivée</td>
            </tr>
            @foreach($vols as $vols)
            <tr>
                <td>{{$vols['numero']}}</td>
                <td>{{$vols['compagnies_id']}}</td>
                <td>{{$vols['nombre_place']}}</td>
                <td>{{$vols['date_depart']}}</td>
                <td>{{$vols['date_arivee']}}</td>
                <td>{{$vols['heure_depart']}}</td>
                <td>{{$vols['heure_arivee']}}</td>
                <td>{{$vols['aeroport_id_depart']}}</td>
                <td>{{$vols['aeroport_id_arivee']}}</td>

            </tr>
            @endforeach
        </table>

        <br><br>
        <a href="/tableau">Lien vers la page tableau (Work in progress)</a>
        <br><br>
        <a href="/aeroport/index">Lien vers la gestion des aeroports</a>
    </body>
</html>
