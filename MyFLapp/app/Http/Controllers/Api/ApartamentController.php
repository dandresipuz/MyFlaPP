<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Apartament;
use App\Models\Residential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApartamentRequest;
use App\Http\Resources\Api\ApartamentResource;

class ApartamentController extends ApiResponseController
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
        $apartaments = Apartament::paginate(10);
        return $this->responseApi($apartaments);
    }
    public function all()
    {
        return ApartamentResource::collection(Apartament::latest()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return $this->responseCreateApi($apartament);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartament $apartament)
    {
        return new ApartamentResource($apartament);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
            return $this->responseApi($apartament);
        }
        return response()->json(['message' => 'Error to update apartament'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartament $apartament)
    {
        if ($apartament->delete()) {
            return $this->responseApi($apartament);
        }
        return response()->json(['message' => 'Error to update apartament'], 500);
    }
    public function residential(Residential $residential)
    {
        $residential = $residential->id;
        $apartaments = Apartament::where('residential_id', $residential)->get();
        // dd($apartaments);
        return $this->responseApi($apartaments);
    }
    public function user(User $user)
    {
        $user = $user->id;
        $apartaments = Apartament::where('user_id', $user)->get();
        // dd($apartaments);
        return $this->responseApi($apartaments);
    }
}
