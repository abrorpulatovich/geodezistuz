<?php

namespace App\Http\Controllers;

use App\Models\Workbook;
use App\Http\Requests\StoreWorkbookRequest;
use App\Http\Requests\UpdateWorkbookRequest;

class WorkbookController extends Controller
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
     * @param  \App\Http\Requests\StoreWorkbookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkbookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workbook  $workbook
     * @return \Illuminate\Http\Response
     */
    public function show(Workbook $workbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workbook  $workbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Workbook $workbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkbookRequest  $request
     * @param  \App\Models\Workbook  $workbook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkbookRequest $request, Workbook $workbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workbook  $workbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workbook $workbook)
    {
        //
    }
}
