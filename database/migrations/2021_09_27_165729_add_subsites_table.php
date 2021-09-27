<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubsitesTable extends Migration
{
    public function up()
    {
        Schema::create('subsites', function (Blueprint $table){
            $table->id();
            $table->string('name', 50);
            $table->boolean('visible');
            $table->boolean('secured');
            $table->string('password');
            $table->integer('article_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subsites');
    }
}
