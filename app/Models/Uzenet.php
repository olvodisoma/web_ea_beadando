<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzenet extends Model
{
    use HasFactory;

    protected $table = 'uzenet'; // mert nem többes számú
    protected $fillable = ['nev', 'email', 'tema', 'uzenet'];
}

