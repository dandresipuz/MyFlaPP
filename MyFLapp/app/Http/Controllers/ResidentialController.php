<?php

namespace App\Http\Controllers;

use App\Models\Residential;
use Illuminate\Http\Request;
use App\Http\Requests\ResidentialRequest;
use App\Models\User;

class ResidentialController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function index()
    {
    // $residentials = Residential::paginate(10);
    // return view('home')->with('residentials', $residentials);
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residentials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidentialRequest $request)
    {
        $residential = new Residential;
        $residential->name = $request->name;
        $residential->description = $request->description;
        $residential->phone = $request->phone;
        $residential->user_id = $request->user_id;
        $residential->address = $request->address;
        $residential->city = $request->city;

        if ($request->hasFile('photo')) {
            $file = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/residentials/'), $file);
            $residential->photo = 'images/residentials/' . $file;
        }

        if ($residential->save()) {
            return redirect('admin/home')->with('message', 'El registro: ' . $residential->name . ' fue agregado con Exito!');
            // return response()->json('ok'); API
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function show(Residential $residential)
    {
        return view('residentials.show')->with('residential', $residential);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function edit(Residential $residential)
    {
        $users = User::where('role', 'Admin')->get();
        return view('residentials.edit')->with('residential', $residential)
            ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function update(ResidentialRequest $request, Residential $residential)
    {
        // dd($request->all());
        $residential->name = $request->name;
        $residential->description = $request->description;
        if ($request->hasFile('photo')) {
            $file = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/residentials/'), $file);
            $residential->photo = 'images/residentials/' . $file;
        }
        $residential->phone = $request->phone;
        $residential->address = $request->address;
        $residential->user_id = $request->user_id;
        if ($residential->slider == 2) { //Pregunta si es 2 se pasa a 0
            $residential->slider = 0;
        } else {
            $residential->slider = $request->active; //Si no se queda en 1
        }
        if ($residential->active == 2) { //Pregunta si es 2 se pasa a 0
            $residential->active = 0;
        } else {
            $residential->active = $request->active; //Si no se queda en 1
        }
        if ($residential->save()) {
            return redirect('admin/home')->with('message', 'El registro: ' . $residential->name . ' fue modificado con Exito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residential $residential)
    {
        if ($residential->delete()) {
            return redirect('admin/home')->with('message', 'El registro: ' . $residential->name . ' fue eliminado con Exito!');
        }
    }
}
