<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\LibRequest;
use App\Http\Requests\StoreLibRequest;
use App\Http\Requests\UpdateLibRequest;
use App\Http\Resources\V1\LibResource;
use App\Models\Book;
use App\Repositories\LibsRepository;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;
use App\Http\Library\ApiHelpers;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;


class LibController extends BaseController
{

    use ApiHelpers;

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
     * @param StoreLibRequest $request
     * @return LibResource
     */
    public function store(StoreLibRequest $request)
    {
        $book = Book::create($request->all());
        return new LibResource($book);
    }

    /**
     * Display the specified resource.
     * @param Book $book
     * @return LibResource
     */
    public function show(Book $book): LibResource
    {
        return new LibResource($book);
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateLibRequest $request
     * @param Book $book
     * @return LibResource
     */
    public function update(UpdateLibRequest $request, Book $book): LibResource
    {
        $book->update($request->all());
        return new LibResource($book);
    }

    /**
     * Remove the specified resource from storage.
     * @param Book $book
     * @return JsonResponse
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'Book removed'
        ]);
    }

    /**
     * Reserve book
     * @param Book $book
     * @param BookService $bookService
     * @return \Illuminate\Http\Response
     */
    public function reserve(Book $book, BookService $bookService)
    {
        if (!$bookService->reserve($book)) {
            throw new ConflictHttpException('Book already reserved');
        }

        return Response::noContent();
    }

    /**
     * Unreserve book
     * @param Book $book
     * @param BookService $bookService
     * @return \Illuminate\Http\Response
     */
    public function unreserve(Book $book, BookService $bookService)
    {
        $bookService->unreserve($book);

        return Response::noContent();
    }
}
