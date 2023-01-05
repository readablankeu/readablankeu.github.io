<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisprodukIdToKuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kupons', function (Blueprint $table) {
            $table->foreignId('jenisproduk_id')->after('nama_kupon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kupons', function (Blueprint $table) {
            $table->dropColumn('jenisproduk_id');
        });
    }
}
