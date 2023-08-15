<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_visiteur',
        'nom',
        'nombre_jour',
        'tarif',
        'tarif_total'
    ];
}