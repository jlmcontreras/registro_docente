<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Persona;


use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request  $request)
    {
       // $docentes = Docente::paginate(10);
        //$docentes= DB::table('docentes')->paginate(15);
        //  return view('docentes.docente_index2', compact('docentes'));
        $search= $request->get('search');
        $docentes = Docente::search($search)->paginate(10);;
        return view('docentes.docente_index', compact('docentes'));

    }

    public function search(Request  $request)
    {

       // $data= Docente::paginate(10);
      // $filter=  $data->index('docentes')->search('$request.search')::paginate(10);
       // return view('docentes.docente_index', compact('data'));
       /* $docentes = Docente::paginate(10);
        $search= $request->get('search');
        var_dump($search);
        exit();*/
        //$docentes = Docente::search($search)->paginate(10);;

       // return response()->json($docentes);

       // return view('docentes.docente_index', compact('docentes'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'documento' => 'required', 'string', 'max:24',
            'apellido' => 'required|string|max:45',
            'nombres' => 'required|string|max:75',
            'sexo' => ['required', Rule::in('M', 'F')],
            'fecha_nacimiento' => 'required|date',
            'domicilio' => 'required|string|max:255',
            'localidad' => 'required|string|max:45',
            'departamento' => 'required|string|max:45',
            'telefono' => 'nullable|string|max:45',
            'celular' => 'required|string|max:45',
            'correo' => 'nullable|email|max:75',
            'titulo' => 'required|string|max:45',
        ]);


        try {
            DB::beginTransaction();

            //se verifica si la persona existe en la BD
            if (DB::table('personas')->where('documento', $request->documento)->exists())
            {
                $persona= DB::table('personas')->where('documento', $request->documento)->get();
                // Se verifica si el docente existe en la bd
                if (DB::table('docentes')->where('persona_id', $persona->id)->doesntExist())
                {
                    // La persona existe por lo tanto se actualiza el registro
                    $persona = new Persona($request->all());
                    $persona->update();

                    // Se genera el Alta del Docente
                    $docente = new Docente();
                    $docente->persona_id = $persona->id;
                    $docente->titulo = $request->titulo;
                    $docente->save();
                    DB::commit();
                    return redirect()->route('docente.index')
                        ->with('success', "Docente creado correctamente");
                }
                else
                {
                    return redirect()->route('docente.create')
                        ->with('warning', "El Docente ya existe");
                }
            }
            else
            {
                //La persona no existe -> Se genera el Alta de la Persona
                $persona = new Persona($request->all());
                $persona->save();

                // Se genera el Alta del Docente
                $docente = new Docente();
                $docente->persona_id = $persona->id;
                $docente->titulo = $request->titulo;
                $docente->save();
                DB::commit();
                return redirect()->route('docente.index')
                    ->with('success', "Docente creado correctamente");
            }

        } catch (\Exception $e) {
            DB::rollBack();
            if ($e->getCode() == 23000) {
                return redirect()->route('docente.index')

                    ->with('danger', "El Docente no fue creado");
            }
            return redirect()->route('docente.index')
                ->with('danger', "El Docente no fue creado, " . $e->getMessage());
        }

    }


    public function show($id)
    {
        //
        $docente = Docente::find($id);
        return view('docentes.docente_show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        //
        $docente = Docente::find($id);
        return view('docentes.docente_edit', compact('docente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'documento' => 'required', 'string', 'max:24',
            'apellido' => 'required|string|max:45',
            'nombres' => 'required|string|max:75',
            'sexo' => ['required', Rule::in('M', 'F')],
            'fecha_nacimiento' => 'required|date',
            'domicilio' => 'required|string|max:255',
            'localidad' => 'required|string|max:45',
            'departamento' => 'required|string|max:45',
            'telefono' => 'nullable|string|max:45',
            'celular' => 'required|string|max:45',
            'correo' => 'nullable|email|max:75',
            'titulo' => 'required|string|max:45',
        ]);
        try {
            DB::beginTransaction();
            $docente = Docente::find($id);

            $persona = Persona::find($docente->persona_id);
            $persona->apellido = $request->get('apellido');
            $persona->nombres = $request->get('nombres');
            $persona->sexo = $request->get('sexo');
            $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
            $persona->domicilio = $request->get('domicilio');
            $persona->localidad = $request->get('localidad');
            $persona->departamento = $request->get('departamento');
            $persona->telefono = $request->get('telefono');
            $persona->celular = $request->get('celular');
            $persona->correo = $request->get('correo');

            $persona->update();


            $docente->titulo = $request->get('titulo');
            $docente->update();

            DB::commit();
            return redirect()->route('docente.index')
                ->with('success', "Docente Actualizado Correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            if ($e->getCode() == 23000) {
                return redirect()->route('docente.index')
                    ->with('danger', "Los Datos no han sido Actualizados");
            }
            return redirect()->route('docente.index')
                ->with('danger', "Los Datos no han sido Actualizados" . $e->getMessage());
        }
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
