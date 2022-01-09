<?php

namespace App\Http\Controllers;

use App\Models\Rezume;
use App\Http\Requests\StoreRezumeRequest;
use App\Http\Requests\UpdateRezumeRequest;

class RezumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRezumeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRezumeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rezume  $rezume
     * @return \Illuminate\Http\Response
     */
    public function show(Rezume $rezume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rezume  $rezume
     * @return \Illuminate\Http\Response
     */
    public function edit(Rezume $rezume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRezumeRequest  $request
     * @param  \App\Models\Rezume  $rezume
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRezumeRequest $request, Rezume $rezume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rezume  $rezume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rezume $rezume)
    {
        //
    }
}
