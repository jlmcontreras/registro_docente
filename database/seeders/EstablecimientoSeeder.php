<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('establecimientos')->insert([
            'nombre' => 'Escuela Normal Superior Dr. José B. Gorostiaga',
            'modalidad' => 'Presencial',
            'zona' => '1',
            'turno' => 'Mañana',
            'domicilio' => 'Uriarte 271',
            'localidad' => 'La Banda',
            'departamento' => 'Banda',
            'telefono' => '+54 385 427-1560',
            'celular' => '+54 385 597-8778',
            'correo' => 'jbgorostiaga2@gmail.com',
        ]);
        DB::table('nivel_has_establecimientos')->insert([
            'establecimiento_id' =>'1' ,
            'nivel_id' => '1',
        ]);
        DB::table('establecimientos')->insert([
            'nombre' => 'Escuela Técnica Nº 1',
            'modalidad' => 'Presencial',
            'zona' => '1',
            'turno' => 'Mañana',
            'domicilio' => 'Avenida Belgrano (N) 750',
            'localidad' => 'Santiago del Estero',
            'departamento' => 'Capital',
            'telefono' => '+54 385 421-4980',
            'celular' => '+54 385 635-4871',
            'correo' => 'tecnica1sgo@gmail.com',
        ]);
        DB::table('nivel_has_establecimientos')->insert([
            'establecimiento_id' =>'2' ,
            'nivel_id' => '2',
        ]);
    }
}
