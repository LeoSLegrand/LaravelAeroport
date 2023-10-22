## Installation

Tous d'abord, dans le document '.env' on doit modifier ces lignes de code :<br><br>

DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=aeroport<br>
DB_USERNAME=root<br>
DB_PASSWORD=secret<br><br>

Par la suite on peut lancer les Seeder pour remplir la base de donée avec les commandes suivantes :<br><br>

> artisan db:seed --class VolsSeeder<br>
> artisan db:seed --class CompagniesSeeder<br>
> artisan db:seed --class AeroportsSeeder<br>

Pour avoir le css de bootsrap on doit se rendre dans le dossier avec le fichier 'package.json' puis :

entrer la commande 'npm run dev'<br><br>

si la commande échoue, on doit installer npm avec la commande 'npm npm install'<br><br>

Pour créé un compte Admin on doit modifié la ligne suivante dans le fichier User.php :<br><br>

    $bouncer->assign('roleCompagnie')->to($user); devient $bouncer->assign('admin')->to($user);



