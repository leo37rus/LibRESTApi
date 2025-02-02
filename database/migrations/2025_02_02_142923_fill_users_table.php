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
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'password' => 'admin',
                'role' => 'admin',
                'remember_token' => '123',
            ],
            [
                'name' => 'user',
                'password' => 'user',
                'role' => 'user',
                'remember_token' => '111',
            ]

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')
            ->wherein('name', ['', ''])
            ->delete();
    }
};
