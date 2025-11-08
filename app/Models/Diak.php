<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diak extends Model
{
    use HasFactory;

    protected $table = 'diak';
    protected $fillable = ['nev', 'osztaly', 'fiu'];

    public function jegyek()
    {
        return $this->hasMany(Jegy::class, 'diak_id');
    }
}

