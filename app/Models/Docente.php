<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
    ];

    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
