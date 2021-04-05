@extends('layouts.app')

@section('title', $residential->name)
@section('content')
    <div class="container mt-3">
        <div class="col-md-8 offset-md-2">
            <h1>
                <i class="far fa-building"></i>
                {{ $residential->name }} {{ $residential->lastname }}
            </h1>
            <hr>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/home') }}">
                            <i class="fa fa-clipboard-list"></i>
                            Dashboard {{ Auth::user()->role }}
                        </a>
                    </li>
                    {{-- <li class="breadcrumb-item">
            <a href="{{ route('users.index') }}">
                <i class="fa fa-users"></i>
                Módulo Usuarios
            </a>
        </li> --}}
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="far fa-building"></i>
                        {{ $residential->name }} {{ $residential->lastname }}
                    </li>
                </ol>
            </nav>
            <table class="table table-striped table-hover">
                <tr>
                    <td colspan="2" class="text-center">
                        <img src="{{ asset($residential->photo) }}" class="img-thumbnail" width="180px">
                    </td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $residential->name }}</td>
                </tr>
                <tr>
                    <th>Descripciòn:</th>
                    <td>{{ $residential->description }}</td>
                </tr>
                <tr>
                    <th>Responsable:</th>
                    <td>{{ $residential->user->name }} {{ $residential->user->lastname }}</td>
                </tr>
                <tr>
                    <th>Teléfono:</th>
                    <td>{{ $residential->phone }}</td>
                </tr>
                <tr>
                    <th>Dirección:</th>
                    <td>{{ $residential->address }} {{ $residential->city }}</td>
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td>
                        @if ($residential->active == 1)
                            <button class="btn btn-success"><i class="fa fa-check"></i> Disponible
                            @else
                                <button class="btn btn-dark"><i class="fa fa-times"></i> Baja
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
