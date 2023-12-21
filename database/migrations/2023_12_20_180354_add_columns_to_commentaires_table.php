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
        Schema::table('commentaires', function (Blueprint $table) {
            $table->integer('nb_reponse')->nullable()->after('secteur_visiteur');
            $table->integer('nb_jaime')->nullable()->after('nb_reponse');
            $table->integer('nb_partage')->nullable()->after('nb_jaime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            //
        });
    }
};
