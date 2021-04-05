@extends('layouts.app')

@section('title', 'Dashboard ' . Auth::user()->role)

@section('content')
    <div class="container py-2">

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#users">
                    Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#residentials">
                Conjuntos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#apartaments">
                Apartamentos
                </a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            @include('users.index')
            @include('residentials.index')
            @include('apartaments.index')
        </div>
    </div>

@endsection
