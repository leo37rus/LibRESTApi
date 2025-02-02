<?php

namespace App\Repositories;

use App\Models\Lib;

use Illuminate\Support\Facades\DB;

/**
 * Repository for works with books
 */
class LibsRepository
{
    /**
     * Return books list on term search.
     * @param string $term term search.
     * @return
     */
    public function getByNameOrAuthor(string $term)
    {
        return DB::table('books')
            ->select('*')
            ->where('author', 'like', "%$term%")
            ->orWhere('name', 'like', "%$term%")
            ->get();
    }
}
