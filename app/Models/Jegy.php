<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jegy extends Model
{
    use HasFactory;

    protected $table = 'jegy';
    protected $fillable = ['diak_id', 'targy_id', 'ertek', 'datum', 'tipus'];

    public function diak()
    {
        return $this->belongsTo(Diak::class, 'diak_id');
    }

    public function targy()
    {
        return $this->belongsTo(Targy::class, 'targy_id');
    }
}
