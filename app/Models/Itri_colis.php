<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_colis extends Model
{
    use HasFactory;
    protected $table = 'itri_colis';
    protected $fillable = ['id_dechet', 'id_request', 'poids_estimee', 'poids_reel'];
    public $timestamps = false;
    
    public function request()
    {
        return $this->belongsTo(Itri_vehicule::class, 'id_request');
    }

}
