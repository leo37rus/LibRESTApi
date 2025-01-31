<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_name');
            $table->string('book_author')->nullable();
            $table->string('book_year');
            $table->boolean('book_access')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libs');
    }
};
