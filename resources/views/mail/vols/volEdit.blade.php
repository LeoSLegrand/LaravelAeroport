<!DOCTYPE html>
<html>
<head>
 <title>Laravel Edit to Database</title>
</head>
<body>

 <h2 style="text-align: center">Une entrée a été éditée dans la base de donnée "Vol"</h2>

 <h4>Information concernant le Vol modifié :</h4>
 <div >
    <li>
        <ul><strong>Numero :</strong>{{ $vols->numero }}</ul>
        <ul><strong>Date Départ :</strong>{{ $vols->date_depart }}</ul>
        <ul><strong>Date Arrivé :</strong>{{ $vols->date_arivee }}</ul>
        <ul><strong>Heure Départ :</strong>{{ $vols->heure_depart }}</ul>
        <ul><strong>Heure Arrivé :</strong>{{ $vols->nombre_arivee }}</ul>
    </li>
 </div>
 

</body>
</html> 


