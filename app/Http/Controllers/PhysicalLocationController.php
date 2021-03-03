<?php

namespace App\Http\Controllers;

use App\PhysicalLocation;
use Illuminate\Http\Request;

class PhysicalLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PhysicalLocation::all(),200);
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
     * @param  \App\PhysicalLocation  $physicalLocation
     * @return \Illuminate\Http\Response
     */
    public function show(PhysicalLocation $physicalLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhysicalLocation  $physicalLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(PhysicalLocation $physicalLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhysicalLocation  $physicalLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhysicalLocation $physicalLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhysicalLocation  $physicalLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhysicalLocation $physicalLocation)
    {
        //
    }
}
