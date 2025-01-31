<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLibRequest;
use App\Http\Requests\UpdateLibRequest;
use App\Models\Lib;

class LibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lib::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lib $lib)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibRequest $request, Lib $lib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lib $lib)
    {
        //
    }
}
