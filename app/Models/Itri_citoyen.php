<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Itri_transfert;

class Itri_citoyen extends Model
{
    use HasFactory;
    protected $table = 'itri_citoyen';
    protected $fillable = ['nom', 'prenom', 'tel', 'email', 'password','point','created_at'];
    public $timestamps = false;

    public function transfert()
    {
        return $this->hasMany(Itri_transfert::class, 'id_client', 'id');
    }
    public function message()
    {
        return $this->hasMany(Itri_message::class, 'id_citoyen', 'id');
    }
    public function avis()
    {
        return $this->hasMany(Itri_avis_citoyen::class, 'id_citoyen', 'id');
    }
    public function location()
    {
        return $this->hasMany(Itri_citoyen_location::class, 'id_citoyen', 'id');
    }
}
