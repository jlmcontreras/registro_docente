<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Docente extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'titulo',
    ];

    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class,'id');
    }

    public function toSearchableArray()
    {
        return
            [
                'documento' => $this->persona->documento,
                'apellido' => $this->persona->apellido,
                'nombres' => $this->persona->nombres,
                'domicilio' => $this->persona->domicilio,
                'titulo' => $this->titulo
            ]

            ;
    }
}
