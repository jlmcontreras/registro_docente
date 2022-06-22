<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre','descripcion'
    ];

    public $timestamps = false;

    public function establecimientos()
    {
        return $this->belongsToMany(Establecimiento::class,'nivel_has_establecimientos');
    }
}
