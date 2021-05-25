<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Residential;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResidentialRequest;
use App\Http\Resources\Api\ResidentialResource;

class ResidentialController extends ApiResponseController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'all']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentials = Residential::paginate(10);
        return $this->responseApi($residentials);
    }

    public function all()
    {
        // $residentials = Residential::get(); // Para paginar usuarios
        // return response()->json($users);
        // return $this->responseApi($residentials);
        return ResidentialResource::collection(Residential::latest()->paginate(10));
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
            return $this->responseCreateApi($residential);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Residential $residential)
    {
        // return $this->responseApi($residential);
        return new ResidentialResource($residential);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResidentialRequest $request, Residential $residential)
    {
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
            return $this->responseApi($residential);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residential $residential)
    {
        if ($residential->delete()) {
            return $this->responseApi($residential);
        }
    }
    public function user(User $user)
    {
        $user = $user->id;
        $residential = Residential::where('user_id', $user)->get();
        // dd($apartaments);
        return $this->responseApi($residential);
    }
}
