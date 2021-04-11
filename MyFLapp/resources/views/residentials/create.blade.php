@extends('layouts.app')

@section('title', 'Agregar')
@section('content')
    <div class="container mt-3">
        <div class="col-md-8 offset-md-2">
            <h1>
                <i class="fas fa-plus"></i>
                Agregar Conjunto
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
                        'Agregar conjunto'
                    </li>
                </ol>
            </nav>
            <form method="POST" action="{{ route('residentials.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="@lang('general.link-name')" autofocus>

                    @error('name')
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
                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone') }}" placeholder="@lang('general.link-phone')">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        name="address" value="{{ old('address') }}" placeholder="@lang('general.link-address')">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{-- <div class="input-group mb-3"> --}}
                    <div class="text-center my-3">
                        <img src="{{ asset('images/users/no-photo.png') }}" class="img-thumbnail" id="preview"
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
                    {{-- </div> --}}
                </div>

                <div class="form-group">
                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        value="{{ old('city') }}" placeholder="Ciudad" autofocus>

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
