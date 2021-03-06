<?php

namespace App\Http\Controllers;

use App\AdministrativeUbication;
use Illuminate\Http\Request;

class AdministrativeUbicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AdministrativeUbication::all(),200);
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
     * @param  \App\AdministrativeUbication  $administrativeUbication
     * @return \Illuminate\Http\Response
     */
    public function show(AdministrativeUbication $administrativeUbication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdministrativeUbication  $administrativeUbication
     * @return \Illuminate\Http\Response
     */
    public function edit(AdministrativeUbication $administrativeUbication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdministrativeUbication  $administrativeUbication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdministrativeUbication $administrativeUbication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdministrativeUbication  $administrativeUbication
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministrativeUbication $administrativeUbication)
    {
        //
    }
}
