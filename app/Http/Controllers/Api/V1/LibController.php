<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\LibRequest;
use App\Http\Requests\StoreLibRequest;
use App\Http\Requests\UpdateLibRequest;
use App\Http\Resources\V1\LibResource;
use App\Models\Lib;
use App\Repositories\LibsRepository;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;



class LibController extends BaseController
{


    /**
     * Display a listing of the resource.
     * @param LibRequest $request
     * @param LibsRepository $repository
     * @return AnonymousResourceCollection
     */
    public function getList(LibRequest $request, LibsRepository $repository): AnonymousResourceCollection
    {

        if ($request->getTerm()) {
            return LibResource::collection($repository->getByNameOrAuthor($request->getTerm()));
        }

        return LibResource::collection(Lib::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibRequest $request)
    {
        $libs = Lib::create($request->all());
        return new LibResource($libs);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lib $lib)
    {
        /*$libs = Lib::find($lib);
        if (is_null($libs))
        {
            abort(403, 'Unauthorized action.');
        }*/
        return new LibResource($lib);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibRequest $request, Lib $lib)
    {
        $lib->update($request->all());
        return new LibResource($lib);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lib $lib)
    {
        $lib->delete();

        return Response::noContent();
    }
}
