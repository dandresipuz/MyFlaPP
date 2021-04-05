<?php

namespace App\Http\Controllers;

use App\Models\Residential;
use Illuminate\Http\Request;

class ResidentialController extends Controller
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Residential $residential)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Residential  $residential
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residential $residential)
    {
        //
    }
}
