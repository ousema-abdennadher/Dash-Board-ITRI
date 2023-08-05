<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_livreur extends Model
{
    use HasFactory;
    protected $table = 'itri_livreur';
    protected $fillable=['nom', 'prenom', 'tel', 'email', 'password','etat'];
    public $timestamps = false;

    public function avis()
    {
        return $this->hasMany(Itri_avis_livreur::class, 'id_livreur', 'id');
    }
    public function conge()
    {
        return $this->hasMany(Itri_conge::class, 'id_livreur', 'id');
    }
    public function voiture()
    {
        return $this->hasMany(Itri_livreur_voiture::class, 'id_livreur', 'id');
    }

}
