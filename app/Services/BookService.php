<?php

namespace App\Services;

use App\Models\Book;

/**
 * Servise for books work
 */
class BookService
{
    /**
     * Reserve book
     * @param Book $book
     * @return bool
     */
    public function reserve(Book $book): bool
    {
        if ($book->access === false) {
            return false;
        }

        $book->access = false;
        $book->save();

        return true;
    }

    /**
     * Unreserve book
     * @param Book $book
     * @return bool
     */
    public function unreserve(Book $book): bool
    {
        $book->access = true;
        $book->save();

        return true;
    }
}
