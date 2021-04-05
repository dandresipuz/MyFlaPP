@extends('layouts.app')


@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-dark-grey">
                                    <h3 class="text-center font-weight-light my-4">@lang('general.link-register')</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="name">@lang('general.link-name')</label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                        id="name" type="text" name="name" value="{{ old('name') }}"
                                                        required autocomplete="name" autofocus
                                                        placeholder="@lang('general.link-name')" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1"
                                                        for="lastname">@lang('general.link-lastname')</label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                        id="lastname" type="text" name="lastname"
                                                        value="{{ old('lastname') }}" required autocomplete="lastname"
                                                        autofocus placeholder="@lang('general.link-lastname')" />
                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">@lang('general.link-email')</label>
                                            <input class="form-control @error('email') is-invalid @enderror" id="email"
                                                type="email" aria-describedby="emailHelp" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="@lang('general.link-email')" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1"
                                                        for="phone">@lang('general.link-phone')</label>
                                                    <input class="form-control @error('phone') is-invalid @enderror"
                                                        id="phone" type="number" name="phone" value="{{ old('phone') }}"
                                                        required autocomplete="phone" autofocus
                                                        placeholder="@lang('general.link-phone')" />
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1"
                                                        for="birthdate">@lang('general.link-birthdate')</label>
                                                    <input
                                                        class="form-control @error('birthdate') is-invalid @enderror"
                                                        id="birthdate" type="date" name="birthdate"
                                                        value="{{ old('birthdate') }}" required autocomplete="birthdate"
                                                        autofocus placeholder="@lang('general.link-birthdate')" />
                                                    @error('birthdate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1"
                                                        for="gender">@lang('general.link-gender')</label>
                                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror"
                                                        id="gender">
                                                        <option value="">@lang('general.select-value')</option>
                                                        <option value="Female" @if (old('gender') == 'Female') selected @endif>@lang('general.select-female')</option>
                                                        <option value="Male" @if (old('gender') == 'Male') selected @endif>@lang('general.select-male')</option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1"
                                                        for="address">@lang('general.link-address')</label>
                                                    <input
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        id="address" type="text" name="address"
                                                        value="{{ old('address') }}" required autocomplete="address"
                                                        autofocus placeholder="@lang('general.link-address')" />
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1"
                                                        for="password">@lang('general.link-password')</label>
                                                    <input class="form-control @error('password') is-invalid @enderror"
                                                        id="password" type="password" name="password" required
                                                        autocomplete="new-password"
                                                        placeholder="@lang('general.link-password')" />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1"
                                                        for="password-confirm">@lang('general.link-confir_password')</label>
                                                    <input class="form-control" id="password-confirm" type="password"
                                                        name="password_confirmation" required autocomplete="new-password"
                                                        placeholder="@lang('general.link-confir_password')" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0"><button type="submit"
                                                class="btn btn-primary btn-block">
                                                @lang('general.link-register')
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a class="btn btn-link" href="{{ route('login') }}">Tienes una
                                            cuenta? Ve a loguearte</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
