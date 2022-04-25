@extends('layouts/home')
@section('content')

    <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
        <a class="btn  btn-primary active" href="{{ route('docente.create') }}" type="button">
            Nuevo Docente
        </a>
    </div>
    <br>
    <table class="table table-responsive table-sm table-bordered">
        <thead>
        <tr class="text-center">
            <th scope="col">Documento</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Titulo</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($docentes as $docente)
<<<<<<< Updated upstream
            <tr class="text-center">
                <th scope="row">{{  $docente->persona->documento}}</th>
=======
            <tr class="text-center  ">
                <th class="fst-normal" scope="row">{{  $docente->persona->documento}}</th>
>>>>>>> Stashed changes
                <th scope="row">{{ $docente->persona->apellido   }}</th>
                <th scope="row">{{ $docente->persona->nombres   }}</th>
                <th scope="row">{{ $docente->titulo   }}</th>
                <th scope="row" >
                    <a class="btn btn-primary btn-xs btn-sm" href="{{ $docente->id }}/edit">
                        Editar
                    </a>
                    <a class="btn btn-info btn-xs btn-sm" href="{{ $docente->id }}/show">
                        Mostrar
                    </a>
                    <form action="{{ $docente->id }}/confirm" method="POST"
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
<<<<<<< Updated upstream

=======
    {{$docentes->links()}}
>>>>>>> Stashed changes
@endsection

