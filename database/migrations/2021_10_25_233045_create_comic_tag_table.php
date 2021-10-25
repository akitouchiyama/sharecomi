<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_tag', function (Blueprint $table) {
            // comic_idとtag_idを外部キーに設定
            $table->integer('comic_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['comic_id', 'tag_id']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_tag');
    }
}
