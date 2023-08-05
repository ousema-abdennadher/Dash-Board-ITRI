<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Itri_citoyen;

class Itri_transfert extends Model
{
    use HasFactory;
    protected $table = 'itri_transfert';
    protected $fillable = ['methode', 'id_client', 'point', 'created_at'];
    public $timestamps = false;
    
   
}