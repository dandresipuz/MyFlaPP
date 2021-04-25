@extends('layouts.app')

@section('title', $apartament->number)
@section('content')
    <div class="container mt-3">
        <div class="col-md-8 offset-md-2">
            <h1>
                <i class="fas fa-house-user"></i>
                {{ $apartament->number }} {{ $apartament->residential->name }}
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
                        <i class="fas fa-house-user"></i>
                        {{ $apartament->number }} {{ $apartament->residential->name }}
                    </li>
                </ol>
            </nav>
            <table class="table table-striped table-hover">
                <tr>
                    <td colspan="2" class="text-center">
                        <img src="{{ asset($apartament->photo) }}" class="img-thumbnail" width="180px">
                    </td>
                </tr>
                <tr>
                    <th>Apto #:</th>
                    <td>{{ $apartament->number }}</td>
                </tr>
                <tr>
                    <th>Descripciòn:</th>
                    <td>{{ $apartament->description }}</td>
                </tr>
                <tr>
                    <th>Responsable:</th>
                    <td>{{ $apartament->user->name }} {{ $apartament->user->lastname }}</td>
                </tr>
                <tr>
                    <th>Teléfono:</th>
                    <td>{{ $apartament->residential->phone }}</td>
                </tr>
                <tr>
                    <th>Precio:</th>
                    <td> $ {{ $apartament->price }}</td>
                </tr>
                <tr>
                    <th>Dirección:</th>
                    <td>{{ $apartament->residential->address }}</td>
                </tr>
                <tr>
                    <th>Conjunto:</th>
                    <td>{{ $apartament->residential->name }}</td>
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td>
                        @if ($apartament->active == 1)
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
