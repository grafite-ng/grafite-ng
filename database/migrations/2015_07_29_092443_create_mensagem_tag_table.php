<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagem_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mensagem_id');
            $table->string('tag_id');
            $table->foreign('mensagem_id')->references('id')->on('mensagens')->onDelete('cascade');
            $table->foreign('tag_id')->references('tag')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mensagem_tags');
    }
}
