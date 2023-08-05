<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_livreur_location extends Model
{
   use HasFactory;
    protected $table = 'itri_livreur_location';
    protected $fillable = ['id_livreur', 'region','latitude', 'longitude', 'created_at'];
    public $timestamps = false;
    public static function location($id_livreur)
    {
        return self::where('id_livreur', $id_livreur)->first();
    }
}
