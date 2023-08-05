<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_citoyen_location extends Model
{
    use HasFactory;
    protected $table = 'itri_citoyen_location';
    protected $fillable = ['id_citoyen', 'adresse', 'code_postal', 'region', 'ville', 'latitude', 'longitude', 'created_at'];
    public $timestamps = false;
    
}
