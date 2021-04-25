@extends('layouts.app')

@section('title', 'Agregar')
@section('content')
    <div class="container mt-3">
        <div class="col-md-8 offset-md-2">
            <h1>
                <i class="fas fa-plus"></i>
                Agregar apartamento
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
                        <i class="fas fa-plus"></i>
                        'Agregar apartamento'
                    </li>
                </ol>
            </nav>
            <form method="POST" action="{{ route('apartaments.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number"
                        value="{{ old('number') }}" placeholder="@lang('Número de apto')" autofocus>

                    @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') }}" placeholder="Descripción"
                        autofocus></textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" placeholder="@lang('Precio')">

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <select name="residential_id" class="form-control @error('residential_id') is-invalid @enderror">
                        <option value="">Seleccione un conjunto...</option>
                        @foreach ($residentials as $residential)
                        <option value="{{ $residential->id }}" @if ($residential->id == old('residential_id')) selected @endif>{{ $residential->name }}</option>
                        @endforeach
                    </select>

                    @error('residential_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{-- <div class="input-group mb-3"> --}}
                    <div class="text-center my-3">
                        <img src="{{ asset('images/apartaments/no-photo.png') }}" class="img-thumbnail" id="preview"
                            width="120px">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo"
                            name="photo" accept="image/*">
                        <label class="custom-file-label" for="customFile">
                            <i class="fa fa-upload"></i>
                            Foto
                        </label>
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block text-uppercase">
                        Guardar
                        <i class="fa fa-save"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
