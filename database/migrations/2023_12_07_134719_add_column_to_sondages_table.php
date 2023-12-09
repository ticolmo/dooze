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
        Schema::table('sondages', function (Blueprint $table) {
            $table->integer('nb_choix_1_q_1')->nullable()->after('choix_1_q_1');
            $table->integer('nb_choix_2_q_1')->nullable()->after('choix_2_q_1');
            $table->integer('nb_choix_3_q_1')->nullable()->after('choix_3_q_1');
            $table->integer('nb_choix_4_q_1')->nullable()->after('choix_4_q_1');
            $table->integer('nb_choix_5_q_1')->nullable()->after('choix_5_q_1');
            $table->integer('nb_choix_6_q_1')->nullable()->after('choix_6_q_1');
            $table->integer('nb_choix_1_q_2')->nullable()->after('choix_1_q_2');
            $table->integer('nb_choix_2_q_2')->nullable()->after('choix_2_q_2');
            $table->integer('nb_choix_3_q_2')->nullable()->after('choix_3_q_2');
            $table->integer('nb_choix_4_q_2')->nullable()->after('choix_4_q_2');
            $table->integer('nb_choix_5_q_2')->nullable()->after('choix_5_q_2');
            $table->integer('nb_choix_6_q_2')->nullable()->after('choix_6_q_2');
            $table->integer('nb_choix_1_q_3')->nullable()->after('choix_1_q_3');
            $table->integer('nb_choix_2_q_3')->nullable()->after('choix_2_q_3');
            $table->integer('nb_choix_3_q_3')->nullable()->after('choix_3_q_3');
            $table->integer('nb_choix_4_q_3')->nullable()->after('choix_4_q_3');
            $table->integer('nb_choix_5_q_3')->nullable()->after('choix_5_q_3');
            $table->integer('nb_choix_6_q_3')->nullable()->after('choix_6_q_3');
            $table->integer('nb_choix_1_q_4')->nullable()->after('choix_1_q_4');
            $table->integer('nb_choix_2_q_4')->nullable()->after('choix_2_q_4');
            $table->integer('nb_choix_3_q_4')->nullable()->after('choix_3_q_4');
            $table->integer('nb_choix_4_q_4')->nullable()->after('choix_4_q_4');
            $table->integer('nb_choix_5_q_4')->nullable()->after('choix_5_q_4');
            $table->integer('nb_choix_6_q_4')->nullable()->after('choix_6_q_4');
            $table->integer('nb_choix_1_q_5')->nullable()->after('choix_1_q_5');
            $table->integer('nb_choix_2_q_5')->nullable()->after('choix_2_q_5');
            $table->integer('nb_choix_3_q_5')->nullable()->after('choix_3_q_5');
            $table->integer('nb_choix_4_q_5')->nullable()->after('choix_4_q_5');
            $table->integer('nb_choix_5_q_5')->nullable()->after('choix_5_q_5');
            $table->integer('nb_choix_6_q_5')->nullable()->after('choix_6_q_5');
            $table->integer('nb_choix_1_q_6')->nullable()->after('choix_1_q_6');
            $table->integer('nb_choix_2_q_6')->nullable()->after('choix_2_q_6');
            $table->integer('nb_choix_3_q_6')->nullable()->after('choix_3_q_6');
            $table->integer('nb_choix_4_q_6')->nullable()->after('choix_4_q_6');
            $table->integer('nb_choix_5_q_6')->nullable()->after('choix_5_q_6');
            $table->integer('nb_choix_6_q_6')->nullable()->after('choix_6_q_6');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sondages', function (Blueprint $table) {
            //
        });
    }
};
