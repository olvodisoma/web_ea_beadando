<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Targy extends Model
{
    use HasFactory;

    protected $table = 'targy';
    protected $fillable = ['nev', 'kategoria'];

    public function jegyek()
    {
        return $this->hasMany(Jegy::class, 'targy_id');
    }
}
