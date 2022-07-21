@extends('layouts/home')
@section('content')
    <h1>Establecimientos</h1>
    <form action="{{ route('establecimiento.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class=" col-md-12">
                <label for="nombreEstablecimiento">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombreEstablecimiento"
                       placeholder="Nombre del Establecimiento" value="{{ old('nombre') }}">
                @error('nombre')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="domicilioEstablecimiento">Domicilio</label>
                <input type="text" class="form-control" name="domicilio" id="domicilioEstablecimiento"
                       placeholder="Domicilio del Establecimiento" value="{{ old('domicilio') }}">
                @error('domicilio')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 ">
                <label for="localidadEstablecimiento">Localidad</label>
                <input type="text" name="localidad" class="form-control" id="localidadEstablecimiento"
                       placeholder="Localidad del Establecimiento"
                       value="{{ old('localidad') }}">
                @error('localidad')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 ">
                <label for="departamentoEstablecimiento">Departamento</label>
                <input type="text" name="departamento" class="form-control" id="departamentoEstablecimiento"
                       placeholder="Departamento del Establecimiento"
                       value="{{ old('departamento') }}">
                @error('departamento')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="modalidadEstablecimiento">Modalidad</label>
                <input type="text" class="form-control" name="modalidad" id="modalidadEstablecimiento"
                       placeholder="Modalidad del Establecimiento" value="{{ old('modalidad') }}">
                @error('modalidad')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="zonaEstablecimiento">Zona</label>
                <select id="zonaEstablecimiento" name="zona" class="form-control">
                    @if(old('zona'))
                        <option
                            @if(old('zona') != '1' && old('zona') != '2'&& old('zona') != '3' && old('zona') != '4') selected @endif>
                            Seleccione...
                        </option>
                        <option @if(old('zona') == '1')selected @endif value="1">1</option>
                        <option @if(old('zona') == '2')selected @endif value="2">2</option>
                        <option @if(old('zona') == '3')selected @endif value="3">3</option>
                        <option @if(old('zona') == '4')selected @endif value="4">4</option>
                    @else
                        <option selected>Seleccione...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    @endif
                </select>
                @error('zona')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="turnoEstablecimiento">Turno</label>
                <input type="text" class="form-control" name="turno" id="turnoEstablecimiento"
                       placeholder="Turno del Establecimiento" value="{{ old('turno') }}">
                @error('turno')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="telefonoEstablecimiento">Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefonoEstablecimiento"
                       placeholder="Teléfono del Establecimiento" value="{{ old('telefono') }}">
                @error('telefono')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="celularEstablecimiento">Celular</label>
                <input type="text" class="form-control" name="celular" id="celularEstablecimiento"
                       placeholder="Celular del Establecimiento" value="{{ old('celular') }}">
                @error('celular')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4col-md-4">
                <label for="correoEstablecimiento">Correo</label>
                <input type="email" class="form-control" name="correo" id="correoEstablecimiento"
                       placeholder="Correo del Establecimiento"
                       value="{{ old('correo') }}">
                @error('correo')
                <span class="badge badge-danger text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="nivelEstablecimiento">Nivel</label>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">
                        <input class="form-check-input me-1" id="nivelPrimario" name="nivelPrimario" type="checkbox" value="1" aria-label="...">
                        Primario
                        <br>
                        <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Seleccione el turno</option>
                            <option value="1">Mañana</option>
                            <option value="2">Tarde</option>
                            <option value="3">Vespertino</option>
                        </select>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" name="nivelSecundario" type="checkbox" value="2" aria-label="...">
                        Secundario
                        <br>
                        <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Seleccione el turno</option>
                            <option value="1">Mañana</option>
                            <option value="2">Tarde</option>
                            <option value="3">Vespertino</option>
                        </select>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" name="nivelTerciario" type="checkbox" value="3" aria-label="...">
                        Terciario

                        <select class="form-select form-select-sm" aria-label="Default select example">
                            <option selected>Seleccione el turno</option>
                            <option value="1">Mañana</option>
                            <option value="2">Tarde</option>
                            <option value="3">Vespertino</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <button class="btn btn-icon btn-3 btn-success" type="submit">
            <span class="btn-inner--icon"><i class="far fa-save"></i></span>
            <span class="btn-inner--text">Guardar</span>
        </button>
        <a href="{{route('establecimiento.index')}}" class="btn btn-icon btn-3 btn-danger">
            <span class="btn-inner--icon"><i class="far fa-save"></i></span>
            <span class="btn-inner--text">Cancelar</span>
        </a>
    </form>

@endsection
