@extends('layouts/home')
@section('content')
    <h1>Establecimientos</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
        <a class="btn  btn-primary active" href="{{ route('establecimiento.create') }}" type="button">
            Nuevo Establecimiento
        </a>
        <form class="d-flex" role="search" action="{{route('establecimiento.index')}}" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br>
    <table class="table table-responsive table-sm table-bordered">
        <thead>
        <tr class="text-center">
            <th scope="col">Nombre</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Localidad</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($establecimientos as $establecimiento)
            <tr class="text-center">
                <th scope="row">{{  $establecimiento->nombre}}</th>
                <th scope="row">{{ $establecimiento->Domicilio   }}</th>
                <th scope="row">{{ $establecimiento->Localidad   }}</th>
                <th scope="row" >
                    <a class="btn btn-primary btn-xs btn-sm" href="{{ $establecimiento->id }}/edit">
                        Editar
                    </a>
                    <a class="btn btn-info btn-xs btn-sm" href="{{ $establecimiento->id }}/show">
                        Mostrar
                    </a>
                    <form action="{{ $establecimiento->id }}/confirm" method="POST"
                          style="display:inline">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn btn-danger btn-xs btn-sm" type="submit">
                            Eliminar
                        </button>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$establecimientos->links()}}

@endsection

