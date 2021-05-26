<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('extract')->nullable();
            /* para un texto largo */
            $table->longText('body')->nullable();
            /* status dado: borrador=1 publicado=2 */
            $table->enum('status',[1,2])->default(1);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            /* esta es la clave foranea que hace referencia a id de usuarios */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            /* esta es la clave foranea que hace referencia a id de categorias */
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
