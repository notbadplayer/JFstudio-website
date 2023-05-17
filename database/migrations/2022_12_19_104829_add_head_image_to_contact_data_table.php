<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddHeadImageToContactDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contactdata', function (Blueprint $table) {
            $table->string('header_image')->nullable()->after('description');
        });

        DB::table('contactData')
        ->insertOrIgnore([
            'title' => 'JFstudio',
            'description' => 'Muzyczna społeczność Supraśla i okolic',
            'adress' => 'ul. Wczasowa 12, 16-030 Supraśl',
            'email' => 'fudzijama@yahoo.com',
            'phone' => '123 123 123',
            'header_image' => ''
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contactdata', function (Blueprint $table) {
            $table->dropColumn('header_image');
        });
    }
}
