
<!DOCTYPE html>
<html>
<head>
 <title>Laravel Addition to Database</title>
</head>
<body>

 <h2 style="text-align: center">Une entrée a été créé dans la base de donnée "Compagnie"</h2>

 <h4>Information concernant la compagnie ajouté :</h4>
 <div >
    <li>
        <ul><strong>Nom Compagnie :</strong>{{ $compagnies->nom_compagnie }}</ul>
        <ul><strong>Pays :</strong>{{ $compagnies->pays }}</ul>
    </li>
 </div>
 

</body>
</html> 

