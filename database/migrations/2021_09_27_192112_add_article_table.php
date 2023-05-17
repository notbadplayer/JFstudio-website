<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArticleTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table){
            $table->id();
            $table->string('title', 200);
            $table->text('content');
            $table->boolean('published');
            $table->date('publishDate')->nullable();
            $table->integer('subsite_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
