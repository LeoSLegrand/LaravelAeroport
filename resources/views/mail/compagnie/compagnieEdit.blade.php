
<!DOCTYPE html>
<html>
<head>
 <title>Laravel Edit to Database</title>
</head>
<body>

 <h2 style="text-align: center">Une entrée a été éditée dans la base de donnée "Compagnie"</h2>

 <h4>Information concernant la compagnie modifié :</h4>
 <div >
    <li>
        <ul><strong>Nom Compagnie :</strong>{{ $compagnies->nom_compagnie }}</ul>
        <ul><strong>Pays :</strong>{{ $compagnies->pays }}</ul>
    </li>
 </div>
 

</body>
</html> 

