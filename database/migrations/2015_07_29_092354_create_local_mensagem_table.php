<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalMensagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_mensagem', function (Blueprint $table) {
          $table->increments('id');
          $table->string('mensagem_id');
          $table->string('local_id');
          $table->foreign('mensagem_id')->references('id')->on('mensagens')->onDelete('cascade');
          $table->foreign('local_id')->references('local')->on('locais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('local_mensagens');
    }
}
