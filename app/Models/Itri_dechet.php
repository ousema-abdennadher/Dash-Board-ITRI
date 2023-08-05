<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_dechet extends Model
{
    use HasFactory;
    protected $table = 'itri_dechet';
    protected $fillable = ['poids', 'type', 'sous_type', 'objet', 'point_kg'];
    public $timestamps = false;
}
