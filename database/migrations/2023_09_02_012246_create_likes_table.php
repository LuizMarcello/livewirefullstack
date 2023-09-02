<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tweet_id');
            $table->timestamps();

             /* Relacionamentos */
             /* Coluna "user_id", busca o "id" dos "users" */
             /* Qual usuário que curtiu */
             $table->foreign('user_id')
                         ->references('id')
                         ->on('users');
            /* Coluna "tweet_id", busca o "id" dos "tweets" */
            /* Qual tweet ele curtiu */
             $table->foreign('tweet_id')
                         ->references('id')
                         ->on('tweets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
