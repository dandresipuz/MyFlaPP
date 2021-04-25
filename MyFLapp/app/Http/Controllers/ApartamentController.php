<?php

namespace App\Http\Controllers;

use App\Models\Apartament;
use App\Models\Residential;
use Illuminate\Http\Request;
use App\Http\Requests\ApartamentRequest;
use App\Models\User;

class ApartamentController extends Controller
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
    /*  public function index()
    {
        //
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residentials = Residential::all();
        return view('apartaments.create')->with('residentials', $residentials);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApartamentRequest $request)
    {
        // dd($request->all());
        $apartament = new Apartament;
        $apartament->number = $request->number;
        $apartament->description = $request->description;
        $apartament->price = $request->price;
        $apartament->residential_id = $request->residential_id;
        $apartament->user_id = $request->user_id;
        if ($request->hasFile('photo')) {
            $file = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/apartaments/'), $file);
            $apartament->photo = 'images/apartaments/' . $file;
        }

        if ($apartament->save()) {
            return redirect('admin/home')->with('message', 'El registro: ' . $apartament->number . ' fue agregado con Exito!');
            // return response()->json('ok'); API
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function show(Apartament $apartament)
    {
        return view('apartaments.show')->with('apartament', $apartament);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartament $apartament)
    {
        $users = User::all();
        $residentials = Residential::all();
        return view('apartaments.edit')->with('users', $users)
            ->with('residentials', $residentials)
            ->with('apartament', $apartament);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function update(ApartamentRequest $request, Apartament $apartament)
    {
        $apartament->number = $request->number;
        $apartament->description = $request->description;
        if ($apartament->slider == 2) { //Pregunta si es 2 se pasa a 0
            $apartament->slider = 0;
        } else {
            $apartament->slider = $request->active;
        }
        if ($apartament->active == 2) { //Pregunta si es 2 se pasa a 0
            $apartament->active = 0;
        } else {
            $apartament->active = $request->active; //Si no se queda en 1
        }
        $apartament->user_id = $request->user_id;
        $apartament->residential_id = $request->residential_id;
        if ($request->hasFile('photo')) {
            $file = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/apartaments/'), $file);
            $apartament->photo = 'images/apartaments/' . $file;
        }
        $apartament->price = $request->price;
        if ($apartament->save()) {
            return redirect('admin/home')->with('message', 'El registro: ' . $apartament->number . ' fue modificado con Exito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartament $apartament)
    {
        if ($apartament->delete()) {
            return redirect('admin/home')->with('message', 'El registro: ' . $apartament->number . ' del conjunto ' . $apartament->residential->name . ' fue eliminado con Exito!');
        }
    }
}
