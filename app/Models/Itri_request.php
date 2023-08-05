<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_request extends Model
{
    use HasFactory;
    protected $table = 'itri_request';
    protected $fillable = ['id_client', 'id_livreur', 'date', 'point', 'status','location' , 'created_at'];
    public $timestamps = false;
    
    public function colis()
    {
        return $this->hasMany(Itri_colis::class, 'id_request', 'id');
    }
    public function location()
    {
        return $this->hasMany(Itri_colis::class, 'id_citoyen', 'location');
    }
    
}
