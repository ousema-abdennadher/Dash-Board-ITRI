<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_vehicule extends Model
{
    use HasFactory;
    protected $table = 'itri_vehicule';
    protected $fillable = ['mark', 'capacite', 'charge', 'etat'];
    public $timestamps = false;

    public function voiture()
    {
        return $this->hasMany(Itri_livreur_voiture::class, 'id_vehicule');
    }
}
