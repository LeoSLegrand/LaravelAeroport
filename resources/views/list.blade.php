<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <h1>Liste des vols</h1>

        <table>
            <tr>
                <td>Numéro Vol &nbsp;&nbsp;</td>
                <td>Compagnie &nbsp;&nbsp;</td>
                <td>Nombre place &nbsp;&nbsp;</td>
                <td>Date départ &nbsp;&nbsp;</td>
                <td>Date arivée &nbsp;&nbsp;</td>
                <td>Heure départ &nbsp;&nbsp;</td>
                <td>Heure arivée &nbsp;&nbsp;</td>
                <td>Aeroport départ &nbsp;&nbsp;</td>
                <td>Aeroport arivée</td>
            </tr>
            @foreach($vols as $vols)
            <tr>
                <td style="text-align: center;">{{$vols['numero']}}</td>
                <td style="text-align: center;">{{$vols['compagnies_id']}}</td>
                <td style="text-align: center;">{{$vols['nombre_place']}}</td>
                <td style="text-align: center;">{{$vols['date_depart']}}</td>
                <td style="text-align: center;">{{$vols['date_arivee']}}</td>
                <td style="text-align: center;">{{$vols['heure_depart']}}</td>
                <td style="text-align: center;">{{$vols['heure_arivee']}}</td>
                <td style="text-align: center;">{{$vols['aeroport_id_depart']}}</td>
                <td style="text-align: center;">{{$vols['aeroport_id_arivee']}}</td>
            </tr>
            @endforeach
        </table>

        <br><br>
        <h1>Tableau affichage nombre de vol par mois</h1>
        <table>
            <tr>
                <th>Janvier &nbsp;&nbsp;</th>
                <th>Fevrier &nbsp;&nbsp;</th>
                <th>Mars &nbsp;&nbsp;</th>
                <th>Avril &nbsp;&nbsp;</th>
                <th>Mai &nbsp;&nbsp;</th>
                <th>Juin &nbsp;&nbsp;</th>
                <th>Juillet &nbsp;&nbsp;</th>
                <th>Aout &nbsp;&nbsp;</th>
                <th>Septembre &nbsp;&nbsp;</th>
                <th>Octobre &nbsp;&nbsp;</th>
                <th>Novembre &nbsp;&nbsp;</th>
                <th>Decembre &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td>{{ \App\Models\Vols::nbVolMois(1) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(2) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(3) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(4) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(5) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(6) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(7) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(8) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(9) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(10) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(11) }}</td>
                <td>{{ \App\Models\Vols::nbVolMois(12) }}</td>
            </tr>
        </table>

        <br><br>
        <a href="/aeroport/index">Lien vers la gestion des aeroports</a>
        <div>&nbsp;&nbsp;</div>
        <a href="/company/index">Lien vers la gestion des companies</a>
        <div>&nbsp;&nbsp;</div>
        <a href="/vol/index">Lien vers la gestion des vols</a>
    </body>
</html>
