<?php

namespace Database\Seeders;

use Bouncer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bouncer::allow('admin')->to('access-aeroport');
        // Bouncer::allow('admin')->to('create-aeroport');
        // Bouncer::allow('admin')->to('edit-aeroport');
        // Bouncer::allow('admin')->to('delete-aeroport');

        Bouncer::allow('roleCompagnie')->to('access-compagnie');
        // Bouncer::allow('roleCompagnie')->to('create-compagnie');
        // Bouncer::allow('roleCompagnie')->to('edit-compagnie');
        // Bouncer::allow('roleCompagnie')->to('delete-compagnie');

        Bouncer::allow('roleCompagnie')->to('access-vols');
        // Bouncer::allow('roleCompagnie')->to('create-vols');
        // Bouncer::allow('roleCompagnie')->to('edit-vols');
        // Bouncer::allow('roleCompagnie')->to('delete-vols');
        
    }
}
