@extends('layouts/home')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <label for="documentoPersona">Documento</label>
            <input type="number" readonly class="form-control" name="documento" id="documentoPersona"
                   value="{{ $docente->persona->documento }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="apellidoPersona">Apellido</label>
            <input type="text" readonly class="form-control" name="apellido" id="apellidoPersona"
                   value="{{ $docente->persona->apellido }}">
        </div>
        <div class="col-md-6">
            <label for="nombresPersona">Nombres</label>
            <input type="text" readonly class="form-control" name="nombres" id="nombresPersona"
                   value="{{ $docente->persona->nombres }}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="sexoPersona">Sexo</label>
            @if($docente->persona->sexo == 'M')
                <input type="text" readonly class="form-control" name="sexo" id="sexoPersona"
                       value="Masculino">
            @else
                <input type="text" readonly class="form-control" name="sexo" id="sexoPersona"
                       value="Femenino">
            @endif
        </div>
        <div class="col-md-6">
            <label for="fechaNacimientoPersona">Fecha Nacimiento</label>
            <input type="date" readonly class="form-control" name="fecha_nacimiento" id="fechaNacimientoPersona"
                   value="{{ $docente->persona->fecha_nacimiento }}">
        </div>
    </div>
    <div class="form-group">
        <label for="domicilioPersona">Domicilio</label>
        <input type="text" readonly class="form-control" name="domicilio" id="domicilioPersona"
               value="{{ $docente->persona->domicilio }}">
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="localidadPersona">Localidad</label>
            <input type="text" readonly class="form-control" id="localidadPersona"
                   value="{{ $docente->persona->localidad }}">
        </div>
        <div class="col-md-6">
            <label for="departamentoPersona">Departamento</label>
            <input type="text" readonly class="form-control" id="localidadPersona"
                   value="{{ $docente->persona->departamento }}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="telefonoPersona">Teléfono</label>
            <input type="text" readonly class="form-control" name="telefono" id="telefonoPersona"
                   value="{{ $docente->persona->telefono }}">
        </div>
        <div class="col-md-6">
            <label for="celularPersona">Celular</label>
            <input type="text" readonly class="form-control" name="celular" id="celularPersona"
                   value="{{ $docente->persona->celular }}">
        </div>
    </div>
    <div class="row ">
        <div class="col-md-6">
        <label for="correoPersona">Correo</label>
        <input type="email" readonly class="form-control" name="correo" id="correoPersona"
               value="{{ $docente->persona->correo }}">
        </div>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <label for="tituloDocente">Titulo</label>
            <input type="text" readonly class="form-control" name="titulo" id="tituloDocente"
                   value="{{ $docente->titulo}}">
        </div>
    </div>

    <br>

    <a href="{{ route('docente.index') }}" class="btn btn-icon btn-3 btn-danger">
        <span class="btn-inner--icon"><i class="fa fa-backspace"></i></span>
        <span class="btn-inner--text">Volver a listado</span>
    </a>
@endsection
