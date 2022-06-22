@extends('layouts/home')
@section('content')
    <form action="{{ route('docente.update', ['id' => $docente->id]) }}" method="POST">
        {!! method_field('PUT') !!}
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="documentoPersona">Documento</label>
                <input type="number" readonly class="form-control" name="documento" id="documentoPersona"
                       value="@if(old('documento')){{ old('documento') }}@else{{ $docente->persona->documento }}@endif">
                @error('documento')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="apellidoPersona">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellidoPersona"
                       value="@if(old('apellido')){{ old('apellido') }}@else{{ $docente->persona->apellido }}@endif">
                @error('apellido')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="nombresPersona">Nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombresPersona"
                       value="@if(old('nombres')){{ old('nombres') }}@else{{ $docente->persona->nombres }}@endif">
                @error('nombres')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="sexoPersona">Sexo</label>
                <select id="sexoPersona" name="sexo" class="form-control">
                    @if(old('sexo'))
                        <option @if(old('sexo') != 'M' && old('sexo') != 'F') selected @endif>Seleccione...</option>
                        <option @if(old('sexo') == 'M')selected @endif value="F">Masculino</option>
                        <option @if(old('sexo') == 'F')selected @endif value="M">Femenino</option>
                    @else
                        <option selected>Seleccione...</option>
                        <option @if(old('sexo') == 'M' || $docente->persona->sexo == 'M')selected @endif value="M">
                            Masculino
                        </option>
                        <option @if(old('sexo') == 'F' || $docente->persona->sexo == 'F')selected @endif value="F">
                            Femenino
                        </option>
                    @endif
                </select>
                @error('sexo')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="fechaNacimientoPersona">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fechaNacimientoPersona"
                       value="@if(old('fecha_nacimiento')){{ old('fecha_nacimiento') }}@else{{ $docente->persona->fecha_nacimiento }}@endif">
                @error('fecha_nacimiento')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="domicilioPersona">Domicilio</label>
            <input type="text" class="form-control" name="domicilio" id="domicilioPersona"
                   value="@if(old('domicilio')){{ old('domicilio') }}@else{{ $docente->persona->domicilio }}@endif">
            @error('domicilio')
            <span class="badge badge-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="localidadPersona">Localidad</label>
                <input type="text" class="form-control" name="localidad" id="localidadPersona"
                       value="@if(old('localidad')){{ old('localidad') }}@else{{ $docente->persona->localidad }}@endif">
                @error('localidad')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="departamentoPersona">Departamento</label>
                <input type="text" class="form-control" name="departamento" id="departamentoPersona"
                       value="@if(old('departamento')){{ old('departamento') }}@else{{ $docente->persona->departamento }}@endif">
                @error('departamento')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class=" col-md-6">
                <label for="telefonoPersona">Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefonoPersona"
                       value="@if(old('telefono')){{ old('telefono') }}@else{{ $docente->persona->telefono }}@endif">
                @error('telefono')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="celularPersona">Celular</label>
                <input type="text" class="form-control" name="celular" id="celularPersona"
                       value="@if(old('celular')){{ old('celular') }}@else{{ $docente->persona->celular }}@endif">
                @error('celular')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="correoPersona">Correo</label>
                <input type="email" class="form-control" name="correo" id="correoPersona"
                       value="@if(old('correo')){{ old('correo') }}@else{{ $docente->persona->correo }}@endif">
                @error('correo')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="tituloDocente">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="tituloDocente"
                       value="@if(old('titulo')){{ old('titulo') }}@else{{ $docente->titulo }}@endif">
                @error('titulo')
                <span class="badge badge-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <br>
        <div class="">
        <button class="btn btn-icon btn-3 btn-success" type="submit">
            <span class="btn-inner--icon"><i class="far fa-save"></i></span>
            <span class="btn-inner--text">Actualizar</span>
        </button>
        <a href="{{route('docente.index')}}" class="btn btn-icon btn-3 btn-danger">
            <span class="btn-inner--icon"><i class="fa fa-ban"></i></span>
            <span class="btn-inner--text">Cancelar</span>
        </a>
        </div>
    </form>

@endsection
