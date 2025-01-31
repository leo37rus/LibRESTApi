<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLibRequest;
use App\Http\Requests\UpdateLibRequest;
use App\Models\Lib;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;


class LibController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libs = Lib::all();
        return $this->sendResponse($libs->toArray(), 'Books retrieved successfully.');

    }

    /**
     * Create new resource in storage.
     */
    public function create(StoreLibRequest $request)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibRequest $request)
    {
        $libs = Lib::create($request->all());
        if($libs->fails()){
            return $this->sendError('Validation Error.', $libs->errors());
        }
        return $this->sendResponse($libs->toArray(), 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libs = Lib::find($id);
        if (is_null($libs)) {
            return $this->sendError('Book not found.');
        }
        return $this->sendResponse($libs->toArray(), 'Book retrieved successfully.');
    }

    /**
     * Edit the specified resource in storage.
     */
    public function edit(Lib $libs)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibRequest $request, Lib $libs)
    {
        $libs->update($request->all());
        return $this->sendResponse($libs->toArray(), 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lib $libs)
    {
        //
    }
}
