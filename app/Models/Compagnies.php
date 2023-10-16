<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagnies extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_compagnie',
        'pays',
    ];
}
