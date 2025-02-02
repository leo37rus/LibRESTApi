<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\LibRequest;
use App\Http\Requests\StoreLibRequest;
use App\Http\Requests\UpdateLibRequest;
use App\Http\Resources\V1\LibResource;
use App\Models\Book;
use App\Repositories\LibsRepository;
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

        return LibResource::collection(Book::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibRequest $request)
    {
        $books = Book::create($request->all());
        return new LibResource($books);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): LibResource
    {
        /*$lib = Lib::find($id);
        if (is_null($lib))
        {
            abort(404, 'Not found.');
        }*/
        return new LibResource($book);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibRequest $request, Book $book): LibResource
    {
        $book->update($request->all());
        return new LibResource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'Book removed'
        ]);
    }
}
