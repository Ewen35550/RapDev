<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rappeur extends Model
{
    use HasFactory;
    
    protected $table = "rappeurs";

    protected $fillable = ["id", "token"];
}
