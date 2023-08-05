<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itri_message extends Model
{
    use HasFactory;
    protected $table = 'itri_message';
    protected $fillable = ['titre', 'description', 'id_citoyen', 'date'];
    public $timestamps = false;

   
}
