<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSubsitesTableAllowNullValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subsites', function (Blueprint $table) {
            $table->boolean('secured')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->integer('article_id')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subsites', function (Blueprint $table) {
            $table->boolean('secured')->change();
            $table->string('password')->change();
            $table->integer('article_id')->change();
        });
    }
}
