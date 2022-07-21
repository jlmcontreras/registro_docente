<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Establecimiento extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nombre','modalidad', 'zona','turno','domicilio','localidad','departamento','telefono','celular','correo',
    ];

    public $timestamps = false;

    public function niveles()
    {
        return $this->belongsToMany(Nivel::class,'nivel_has_establecimientos');
    }

    public function toSearchableArray()
    {
        return
            [
                'nombres' => $this->nombres,
                'domicilio' => $this->domicilio,
                'localidad' => $this->localidad
            ]
            ;
    }
}
