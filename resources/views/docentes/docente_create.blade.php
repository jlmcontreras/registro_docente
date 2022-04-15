@extends('layouts/home')
@section('content')
    <form action="{{ route('docente.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="documentoPersona">Documento</label>
                <input type="number" class="form-control" name="documento" id="documentoPersona" placeholder="Documento del Docente" value="{{ old('documento') }}">
                @error('documento')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="apellidoPersona">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellidoPersona" placeholder="Apellido del Docente" value="{{ old('apellido') }}">
                @error('apellido')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class=" col-md-6">
                <label for="nombresPersona">Nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombresPersona" placeholder="Nombres del Docente" value="{{ old('nombres') }}">
                @error('nombres')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
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
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    @endif
                </select>
                @error('sexo')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class=" col-md-6">
                <label for="fechaNacimientoPersona">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fechaNacimientoPersona"
                       placeholder="Fecha de Nacimiento del Docente" value="{{ old('fecha_nacimiento') }}">
                @error('fecha_nacimiento')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="form-group">
            <label for="domicilioPersona">Domicilio</label>
            <input type="text" class="form-control" name="domicilio" id="domicilioPersona"
                   placeholder="Domicilio del Docente" value="{{ old('domicilio') }}">
            @error('domicilio')
            <span class="badge badge-danger text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="localidadPersona">Localidad</label>
                <input type="text" name="localidad" class="form-control" id="localidadPersona" placeholder="Localidad del Docente"
                       value="{{ old('localidad') }}">
                @error('localidad')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 ">
                <label for="departamentoPersona">Departamento</label>
                <input type="text" name="departamento" class="form-control" id="departamentoPersona" placeholder="Departamento del Docente"
                       value="{{ old('departamento') }}">
                @error('departamento')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <label for="telefonoPersona">Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefonoPersona"
                       placeholder="Teléfono del Docente" value="{{ old('telefono') }}">
                @error('telefono')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="celularPersona">Celular</label>
                <input type="text" class="form-control" name="celular" id="celularPersona"
                       placeholder="Celular del Docente" value="{{ old('celular') }}">
                @error('celular')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <label for="correoPersona">Correo</label>
            <input type="email" class="form-control" name="correo" id="correoPersona" placeholder="Correo del Docente"
                   value="{{ old('correo') }}">
            @error('correo')
            <span class="badge badge-danger text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tituloDocente">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="tituloDocente"
                   placeholder="Titulo del Docente" value="{{ old('titulo') }}">
            @error('titulo')
            <span class="badge badge-danger text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <button class="btn btn-icon btn-3 btn-success" type="submit">
            <span class="btn-inner--icon"><i class="far fa-save"></i></span>
            <span class="btn-inner--text">Guardar</span>
        </button>
        <a href="{{route('docente.index')}}" class="btn btn-icon btn-3 btn-danger">
            <span class="btn-inner--icon"><i class="far fa-save"></i></span>
            <span class="btn-inner--text">Cancelar</span>
        </a>
    </form>

@endsection
