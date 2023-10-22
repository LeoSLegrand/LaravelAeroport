## Installation

Dans le document '.env' on doit modifier ces lignes de code :<br><br>

>DB_CONNECTION=mysql<br>
>DB_HOST=127.0.0.1<br>
>DB_PORT=3306<br>
>DB_DATABASE=aeroport<br>
>DB_USERNAME=root<br>
>DB_PASSWORD=secret
<br><br>
Par la suite on peut lancer les Seeder pour remplire la base de donée avec les commandes suivantes :<br><br>

> artisan db:seed --class VolsSeeder<br>
> artisan db:seed --class CompagniesSeeder<br>
> artisan db:seed --class AeroportsSeeder<br><br>

Aller dans le dossier avec le fichier 'package.json' puis entrer la commande : <br><br>

> npm run dev<br><br>

Si la commande échoue, on doit installer npm avec la commande : <br><br>

> npm npm install<br><br>

Tout compte créé sea de base un compte 'roleCompagnie'.<br> 
Pour créer un compte Admin on doit modifier la ligne suivante dans le fichier app\Models\User.php :<br><br>

> $bouncer->assign('roleCompagnie')->to($user); <br>
devient <br>
> $bouncer->assign('admin')->to($user); <br>



