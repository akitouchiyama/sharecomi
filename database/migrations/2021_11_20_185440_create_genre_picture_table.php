<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenrePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_picture', function (Blueprint $table) {
            // genre_idとpicture_idを外部キーに設定
            $table->integer('genre_id')->unsigned();
            $table->integer('picture_id')->unsigned();
            $table->primary(['genre_id', 'picture_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_picture');
    }
}
