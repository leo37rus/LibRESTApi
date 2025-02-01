<?php

namespace App\Repositories;

use App\Models\Lib;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Репозиторий для работы с книгами.
 */
class LibsRepository
{
    /**
     * Возвращает список книг по указанному терму поиска.
     *
     * @param string $term Терм поиска.
     * @return
     */
    public function getByNameOrAuthor(string $term)
    {
        return DB::table('libs')
            ->select('*')
            ->where('book_author', 'like', "%$term%")
            ->orWhere('book_name', 'like', "%$term%")
            ->get();
    }
}
