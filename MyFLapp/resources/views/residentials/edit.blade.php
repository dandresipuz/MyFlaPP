@extends('layouts.app')

@section('title', 'Editando ' . $residential->name)
@section('content')
    <div class="container mt-3">
        <div class="col-md-8 offset-md-2">
            <h1>
                <i class="fa fa-edit"></i>
                Editando {{ $residential->name }}
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
                        <i class="fa fa-edit"></i>
                        {{ $residential->name }}
                    </li>
                </ol>
            </nav>
            <form method="POST" action="{{ url('admin/residentials/'. $residential->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $residential->id }}">
                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $residential->name) }}" placeholder="@lang('general.link-name')" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea id="description" type="text" cols="30" row="4"
                        class="form-control @error('description') is-invalid @enderror" name="description"
                        autofocus>{{ old('description', $residential->description) }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone', $residential->phone) }}" placeholder="@lang('general.link-phone')">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        name="address" value="{{ old('address', $residential->address) }}"
                        placeholder="@lang('general.link-address')">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{-- <div class="input-group mb-3"> --}}
                    <div class="text-center my-3">
                        <img src="{{ asset($residential->photo) }}" class="img-thumbnail" id="preview" width="120px">
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
                    <label for="user_id">Agregado por:</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                        <option value="">Seleccione Usuario...</option>
                        @foreach ($users as $user)
                            {{-- @if ($user->id == old('user_id', $game->user_id)) se agrega el segundo parametro y mostrará quien lo creó --}}
                            <option value="{{ $user->id }}" @if ($user->id == old('user_id', $residential->user_id)) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>

                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slider">Destacado: </label>
                    <select name="slider" class="form-control @error('slider') is-invalid @enderror">
                        <option value="">Mostrar en Presentación...</option>
                        <option value="1" @if (old('slider', $residential->slider) == 1) selected @endif>Si</option>
                        <option value="2" @if (old('slider', $residential->slider) == 2) selected @endif>No</option>
                    </select>

                    @error('slider')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="active">Estado: </label>
                    <select name="active" class="form-control @error('active') is-invalid @enderror">
                        <option value="">Cambiar estado</option>
                        <option value="1" @if (old('active', $residential->active) == 1) selected @endif>Activo</option>
                        <option value="2" @if (old('active', $residential->active) == 2) selected @endif>Inactivo</option>
                    </select>

                    @error('active')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        value="{{ old('city', $residential->city) }}" placeholder="Ciudad" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
