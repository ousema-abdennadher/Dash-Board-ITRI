<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_livreur_voiture extends Model
{
    use HasFactory;
    protected $table = 'itri_livreur_vehicule';
    protected $fillable = ['id_vehicule','date'];
    public $timestamps = false;
    
    public function vehicule()
    {
        return $this->belongsTo(Itri_vehicule::class, 'id_vehicule');
    }
    public function livreur()
    {
        return $this->belongsTo(Itri_livreur::class, 'id_livreur');
    }
}

