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
        Schema::table('books', function (Blueprint $table) {
            $table->string('autor_id')->nullable()->after('isbn'); // Remplacez 'existing_column' par le nom d'une colonne existante de votre table

            $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropforeign('books_autor_id_foreign');
            $table->dropColumn('autor_id');
        });
    }
};
