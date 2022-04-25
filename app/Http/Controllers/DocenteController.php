<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Persona;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
<<<<<<< Updated upstream
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $docentes = Docente::all();
        return view('docentes.docente_index2', compact('docentes'));
     //  return redirect()->route('docente.index', compact('docentes'));
=======
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
       $docentes = Docente::paginate(10);
        //$docentes= DB::table('docentes')->paginate(15);
     //  return view('docentes.docente_index2', compact('docentes'));
      return view('docentes.docente_index', compact('docentes'));
>>>>>>> Stashed changes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('docentes.docente_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'documento' => 'required','string','max:24',
            'apellido' => 'required|string|max:45',
            'nombres' => 'required|string|max:75',
            'sexo'=>['required',Rule::in('M','F')],
            'fecha_nacimiento' => 'required|date',
            'domicilio' => 'required|string|max:255',
            'localidad' => 'required|string|max:45',
            'departamento' => 'required|string|max:45',
            'telefono' => 'nullable|string|max:45',
            'celular' => 'required|string|max:45',
            'correo' => 'nullable|email|max:75',
            'titulo' => 'required|string|max:45',
        ]);
<<<<<<< Updated upstream
/**
        try {
            DB::beginTransaction();


            if (DB::table('personas')->where('documento', $request->documento)->exists()) {
                // ...
                // Se genera el Alta de la Persona si no existe
              //  $persona = new Persona($request->all());
                dd($persona);
               // $persona->update();
            }
            else{
                //$persona = new Persona($request->all());
                dd('Hola mundo');
                //$persona->save();
            }

            if (DB::table('docente')->where('persona_id', $persona->id)->doesntExist()) {
=======

        try {
            DB::beginTransaction();

            //se verifica si la persona existe en la BD
            if (DB::table('personas')->where('documento', $request->documento)->exists()) {
                // Se verifica si el docente existe en la bd
                if (DB::table('docentes')->where('persona_id', $persona->id)->doesntExist()) {
                    // La persona existe por lo tanto se actualiza el registro
                    $persona = new Persona($request->all());
                    $persona->update();

                    // Se genera el Alta del Docente
                    $docente = new Docente();
                    $docente->persona_id = $persona->id;
                    $docente->titulo = $request->titulo;
                    $docente->save();
                }
                else
                {
                    return redirect()->route('docente.create')
                        ->with('warning', "El Docente ya existe");
                }
            }
            else{
                //La persona no existe -> Se genera el Alta de la Persona
                $persona = new Persona($request->all());
                $persona->save();

>>>>>>> Stashed changes
                // Se genera el Alta del Docente
                $docente = new Docente();
                $docente->persona_id = $persona->id;
                $docente->titulo = $request->titulo;
                $docente->save();
            }
<<<<<<< Updated upstream
            else
            {
                return redirect()->route('docente.create')
                    ->with('danger', "El Docente ya existe");
            }

            return redirect()->route('docente.index')
                ->with('success', "Docente creado correctamente");
=======
            return redirect()->route('docente.index')
                ->with('success', "Docente creado correctamente");

>>>>>>> Stashed changes
        } catch (\Exception $e) {
            DB::rollBack();
            if ($e->getCode() == 23000) {
                return redirect()->route('docente.index')
<<<<<<< Updated upstream
                    ->with('danger', "El Empleado no ha sido Creado");
            }
            return redirect()->route('docente.index')
                ->with('danger', "El Empleado no ha sido Creado, " . $e->getMessage());
        }
**/
    //  DB::transaction(function () {
            $persona = new Persona($request->all());
           // dd('Hola mundo');
=======
                    ->with('danger', "El Docente no fue creado");
            }
            return redirect()->route('docente.index')
                ->with('danger', "El Docente no fue creado, " . $e->getMessage());
        }



    /** DB::transaction(function () {
            $persona = new Persona($request->all());
>>>>>>> Stashed changes
            $persona->save();

            $docente = new Docente();
            $docente->persona_id = $persona->id;
            $docente->titulo = $request->titulo;
            $docente->save();

            return redirect()->route('docente.index')
                ->with('success', "Docente creado correctamente");
<<<<<<< Updated upstream
   //     });

=======
      });
**/
>>>>>>> Stashed changes
    }


    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
<<<<<<< Updated upstream
    public function edit(Docente $docente)
    {
        //
=======
    public function edit($id)
    {
        //
        $docente = Docente::find($id);

        return view('docentes.docente_edit', compact('docente'));
>>>>>>> Stashed changes
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
