<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use App\Models\Persona;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request  $request)
    {
        //
        $search= $request->get('search');
        $establecimientos = Establecimiento::search($search)->paginate(10);;
        return view('establecimientos.establecimiento_index', compact('establecimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('establecimientos.establecimiento_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombres' => 'required|string|max:255',
            'modalidad' => 'required|string|max:45',
            'zona' => ['required', Rule::in('1','2','3','4')],
            'turno' => 'required|string|max:45',
            'domicilio' => 'required|string|max:255',
            'localidad' => 'required|string|max:45',
            'departamento' => 'required|string|max:45',
            'telefono' => 'nullable|string|max:45',
            'celular' => 'nullable|string|max:45',
            'correo' => 'nullable|email|max:75',

        ]);
        try {
            DB::beginTransaction();
                $establecimiento = new Establecimiento($request->all());
                $establecimiento->save();
                DB::commit();
                return redirect()->route('establecimiento.index')
                    ->with('success', "Establecimiento creado correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            if ($e->getCode() == 23000) {
                return redirect()->route('establecimiento.index')

                    ->with('danger', "El Establecimiento no fue creado");
            }
            return redirect()->route('establecimiento.index')
                ->with('danger', "El Establecimiento no fue creado, " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $establecimiento = Establecimiento::find($id);
        return view('establecimientos.establecimiento_show', compact('establecimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $establecimiento = Establecimiento::find($id);
        return view('establecimientos.establecimiento_edit', compact('establecimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
                'nombres' => 'required|string|max:255',
                'modalidad' => 'required|string|max:45',
                'zona' => 'required|number',
                'turno' => 'required|string|max:45',
                'nivel' => 'required|string|max:45',
                'domicilio' => 'required|string|max:255',
                'localidad' => 'required|string|max:45',
                'departamento' => 'required|string|max:45',
                'telefono' => 'nullable|string|max:45',
                'celular' => 'nullable|string|max:45',
                'correo' => 'nullable|email|max:75',

        ]);
        try {
            DB::beginTransaction();
            $establecimiento = Establecimiento::find($id);

            $establecimiento->nombres = $request->get('nombres');
            $establecimiento->modalidad = $request->get('modalidad');
            $establecimiento->zona = $request->get('zona');
            $establecimiento->turno = $request->get('turno');
            $establecimiento->domicilio = $request->get('domicilio');
            $establecimiento->localidad = $request->get('localidad');
            $establecimiento->departamento = $request->get('departamento');
            $establecimiento->telefono = $request->get('telefono');
            $establecimiento->celular = $request->get('celular');
            $establecimiento->correo = $request->get('correo');

            $establecimiento->update();


            DB::commit();
            return redirect()->route('establecimiento.index')
                ->with('success', "Establecimiento Actualizado Correctamente");
        } catch (\Exception $e) {
            DB::rollBack();
            if ($e->getCode() == 23000) {
                return redirect()->route('establecimiento.index')
                    ->with('danger', "Los Datos no han sido Actualizados");
            }
            return redirect()->route('establecimiento.index')
                ->with('danger', "Los Datos no han sido Actualizados" . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
