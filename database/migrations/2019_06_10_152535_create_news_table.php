<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('title_slug',255);
            $table->text('summary');
            $table->longText('content');
            $table->string('image');
            $table->integer('featured_news')->default(0);
            $table->integer('view')->default(0);
            $table->integer('typeOfNews_id')->unsigned();
            $table->foreign('typeOfNews_id')->references('id')->on('typeOfNews');
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
        Schema::dropIfExists('news');
    }
}
