<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "titres";

    protected $fillable = ["id_albums", "nom", "duree"];
}
