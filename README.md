## Introduction

Pour Commencer il faut modifier certaine  dans le document :

'C:\Users\leose\OneDrive\Bureau\BTS\annee2\PHP_Laravel\Aeroport\code\project1\.env'

Il faut remplacer ceci :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aeroport
DB_USERNAME=root
DB_PASSWORD=secret

Par la suite on peut lancer les Seeder pour emplir la base de donée avec les commandes suivantes :

> artisan db:seed --class VolsSeeder
> artisan db:seed --class CompagniesSeeder
> artisan db:seed --class AeroportsSeeder
