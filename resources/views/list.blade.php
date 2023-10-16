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
        <h1>Tableau affichage nombre de vol par mois</h1>
        <table>
            <tr>
                <td>Janvier &nbsp;&nbsp;</td>
                <td>Fevrier &nbsp;&nbsp;</td>
                <td>Mars &nbsp;&nbsp;</td>
                <td>Avril &nbsp;&nbsp;</td>
                <td>Mai &nbsp;&nbsp;</td>
                <td>Juin &nbsp;&nbsp;</td>
                <td>Juillet &nbsp;&nbsp;</td>
                <td>Aout &nbsp;&nbsp;</td>
                <td>Septembre &nbsp;&nbsp;</td>
                <td>Octobre &nbsp;&nbsp;</td>
                <td>Novembre &nbsp;&nbsp;</td>
                <td>Decembre &nbsp;&nbsp;</td>
            </tr>
            {{-- @foreach($vols as $vols)
            <tr>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
                <td>{{$vols}}</td>
            </tr>
            @endforeach --}}
        </table>

        <br><br>
        <a href="/aeroport/index">Lien vers la gestion des aeroports</a>
        <div>&nbsp;&nbsp;</div>
        <a href="/company/index">Lien vers la gestion des companies</a>
        <div>&nbsp;&nbsp;</div>
        <a href="/vol/index">Lien vers la gestion des vols</a>
    </body>
</html>
