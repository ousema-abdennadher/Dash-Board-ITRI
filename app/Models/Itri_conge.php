<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_conge extends Model
{
    use HasFactory;
    protected $table = 'itri_conge';
    protected $fillable = ['id_livreur', 'date_conge', 'nb_jours', 'cause'];
    public $timestamps = false; use HasFactory;
}
