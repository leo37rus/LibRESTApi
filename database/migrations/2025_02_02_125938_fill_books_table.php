<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('books')->insert([
            [
                'name' => '1984',
                'author' => 'Jorj Oruell',
                'year' => '1949'

            ],
            [
                'name' => 'War and peace',
                'author' => 'Lev Tolstoy',
                'year' => '1867',
            ],
            [
                'name' => 'The Picture of Dorian Gray',
                'author' => 'Oscar Wilde',
                'year' => '1890',
            ]

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('books')
            ->wherein('name', ['', ''])
            ->delete();
    }
};
