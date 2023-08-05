<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_avis_livreur extends Model
{
    use HasFactory;
    protected $table = 'itri_avis_livreur';
    protected $fillable = ['rating', 'date', 'subject', 'description', 'id_livreur', 'to_citoyen_id'];
    public $timestamps = false;

    public function citoyen()
    {
        return $this->belongsTo(Itri_citoyen::class, 'to_citoyen_id');
    }
}
