<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_avis_citoyen extends Model
{
    use HasFactory;
    protected $table = 'itri_avis_citoyen';
    protected $fillable = ['rating', 'date', 'subject', 'description', 'id_citoyen', 'to_livreur_id'];
    public $timestamps = false;

    public function livreur()
    {
        return $this->belongsTo(Itri_livreur::class, 'to_livreur_id');
    }
}
