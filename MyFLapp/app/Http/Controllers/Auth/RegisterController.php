<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = array(
            'name.required'  => 'El campo "Nombre" es Obligatorio.',
            'lastname.required'  => 'El campo "Apellidos" es Obligatorio.',
            'email.required'     => 'El campo "Correo Electrónico" es Obligatorio.',
            'phone.required'     => 'El campo "Número Telefónico" es Obligatorio.',
            'birthdate.required' => 'El campo "Fecha de Nacimiento" es Obligatorio.',
            'gender.required'    => 'El campo "Genero" es Obligatorio.',
            'address.required'   => 'El campo "Dierección" es Obligatorio.',
            'password.required'  => 'El campo "Contraseña" es Obligatorio.',
        );

        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'phone'     => ['required', 'numeric'],
            'birthdate' => ['required', 'date'],
            'gender'    => ['required'],
            'address'   => ['required',],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'          => $data['name'],
            'lastname'      => $data['lastname'],
            'email'         => $data['email'],
            'phone'         => $data['phone'],
            'birthdate'     => $data['birthdate'],
            'gender'        => $data['gender'],
            'address'       => $data['address'],
            'password'      => Hash::make($data['password']),
        ]);
    }
}
