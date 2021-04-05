<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Apartament;
use App\Models\User;
use App\Models\Residential;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10); // Para paginar usuarios
        $residentials = Residential::all();
        $apartaments = Apartament::all();
        return view('home')->with('users', $users)
                            ->with('residentials', $residentials)
                            ->with('apartaments', $apartaments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->gender = $request->gender;
        $user->address = $request->address;
        if ($request->hasFile('photo')) {
            $file = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/users/'), $file);
            $user->photo = 'images/users/' . $file;
        }
        $user->name = $request->name;
        $user->password = bcrypt($request->password);


        if ($user->save()) {
            return redirect('admin/home')->with(',message', 'El Usuario: ' . $user->name . ' fue agregado con Exito!');
            // return response()->json('ok'); API
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->gender = $request->gender;
        $user->address = $request->address;
        if ($request->hasFile('photo')) {
            $file = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/users/'), $file);
            $user->photo = 'images/users/' . $file;
        }
        $user->active = $request->active;

        if ($user->save()) {
            return redirect('admin/home')->with('message', 'El Usuario: ' . $user->name . ' fue actualizado con Exito!');
            // return response()->json('ok'); API
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect('admin/home')->with('message', 'El Usuario: ' . $user->name . ' fue borrado con Exito!');
            // return response()->json("ok");
        }
    }
}
