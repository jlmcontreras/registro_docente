<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Persona extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'documento', 'apellido', 'nombres', 'sexo', 'fecha_nacimiento', 'domicilio', 'localidad',
        'departamento','telefono', 'celular', 'correo'
    ];

    public $timestamps = false;

    public function docentes(){
        return $this->hasMany(Docente::class);
    }

    public function toSearchableArray()
    {
        return
            [
                'apellido' => $this->apellido,
                'nombres' => $this->nombres,
                'domicilio' => $this->domicilio
            ]

            ;
    }
}
