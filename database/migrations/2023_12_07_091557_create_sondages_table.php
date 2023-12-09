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
        Schema::create('sondages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('club_id'); 
            $table->foreign('club_id')->references('id_club')->on('club')->onUpdate('cascade')->onDelete('restrict');
            $table->time('duree')->nullable();
            $table->string('status',100);
            $table->string('image',100)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('question_1',300);
            $table->string('choix_1_q_1',150);
            $table->string('choix_2_q_1',150);
            $table->string('choix_3_q_1',150)->nullable();
            $table->string('choix_4_q_1',150)->nullable();
            $table->string('choix_5_q_1',150)->nullable();
            $table->string('choix_6_q_1',150)->nullable();
            $table->string('question_2',300)->nullable();
            $table->string('choix_1_q_2',150)->nullable();
            $table->string('choix_2_q_2',150)->nullable();
            $table->string('choix_3_q_2',150)->nullable();
            $table->string('choix_4_q_2',150)->nullable();
            $table->string('choix_5_q_2',150)->nullable();
            $table->string('choix_6_q_2',150)->nullable();
            $table->string('question_3',300)->nullable();
            $table->string('choix_1_q_3',150)->nullable();
            $table->string('choix_2_q_3',150)->nullable();
            $table->string('choix_3_q_3',150)->nullable();
            $table->string('choix_4_q_3',150)->nullable();
            $table->string('choix_5_q_3',150)->nullable();
            $table->string('choix_6_q_3',150)->nullable();
            $table->string('question_4',300)->nullable();
            $table->string('choix_1_q_4',150)->nullable();
            $table->string('choix_2_q_4',150)->nullable();
            $table->string('choix_3_q_4',150)->nullable();
            $table->string('choix_4_q_4',150)->nullable();
            $table->string('choix_5_q_4',150)->nullable();
            $table->string('choix_6_q_4',150)->nullable();
            $table->string('question_5',300)->nullable();
            $table->string('choix_1_q_5',150)->nullable();
            $table->string('choix_2_q_5',150)->nullable();
            $table->string('choix_3_q_5',150)->nullable();
            $table->string('choix_4_q_5',150)->nullable();
            $table->string('choix_5_q_5',150)->nullable();
            $table->string('choix_6_q_5',150)->nullable();
            $table->string('question_6',300)->nullable();
            $table->string('choix_1_q_6',150)->nullable();
            $table->string('choix_2_q_6',150)->nullable();
            $table->string('choix_3_q_6',150)->nullable();
            $table->string('choix_4_q_6',150)->nullable();
            $table->string('choix_5_q_6',150)->nullable();
            $table->string('choix_6_q_6',150)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sondages');
    }
};
