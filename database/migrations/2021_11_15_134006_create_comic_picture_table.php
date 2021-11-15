<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_picture', function (Blueprint $table) {
            // comic_idとpicture_idを外部キーに設定
            $table->integer('comic_id')->unsigned();
            $table->integer('picture_id')->unsigned();
            $table->primary(['comic_id', 'picture_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_picture');
    }
}
