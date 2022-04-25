<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseau extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "reseaux";

    protected $fillable = ["id_rappeur", "youtube", "spotify", "deezer", "soundcloud"];
}
