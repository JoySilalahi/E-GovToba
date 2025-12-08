<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeVillageHeadNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * Note: Changing column types requires doctrine/dbal when using some drivers.
     */
    public function up()
    {
        Schema::table('villages', function (Blueprint $table) {
            $table->string('village_head')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('villages', function (Blueprint $table) {
            $table->string('village_head')->nullable(false)->change();
        });
    }
}
