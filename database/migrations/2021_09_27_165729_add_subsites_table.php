<?php

use App\Models\subsite;
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
            $table->boolean('secured')->nullable();
            $table->string('password')->nullable();
            $table->boolean('editable')->default(1);
            $table->smallInteger('order');
        });

        $mainPage = subsite::create([
            'id' => 1,
            'name' => 'Strona główna',
            'visible' => 1,
            'order' => 1,
            'editable' => 0,

        ]);
    }

    public function down()
    {
        Schema::dropIfExists('subsites');
    }
}
