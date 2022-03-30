<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'documento', 'apellido', 'nombres', 'sexo', 'fecha_nacimiento', 'direccion', 'localidad',
        'departamento','telefono', 'celular', 'correo'
    ];

    public $timestamps = false;

    public function maestros(){
        return $this->hasMany(Docente::class);
    }
}
