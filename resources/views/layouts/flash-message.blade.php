<<<<<<< Updated upstream
<?php

@if ($message = Session::get('success'))
=======
@extends('layouts.home')
@section('flash')

@if ($message = session()->get('success'))
>>>>>>> Stashed changes
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<<<<<<< Updated upstream
@if ($message = Session::get('error'))
=======
@if ($message = session()->get('error'))
>>>>>>> Stashed changes
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<<<<<<< Updated upstream
@if ($message = Session::get('warning'))
=======
@if ($message = session()->get('warning'))
>>>>>>> Stashed changes
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<<<<<<< Updated upstream
@if ($message = Session::get('info'))
=======
@if ($message = session()->get('info'))
>>>>>>> Stashed changes
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Please check the form below for errors</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<<<<<<< Updated upstream
=======

@endsection
>>>>>>> Stashed changes
