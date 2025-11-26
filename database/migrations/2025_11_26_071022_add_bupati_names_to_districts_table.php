<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->string('bupati_name')->nullable()->after('district_head');
            $table->string('wakil_bupati_name')->nullable()->after('bupati_name');
            $table->string('periode')->nullable()->after('wakil_bupati_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->dropColumn(['bupati_name', 'wakil_bupati_name', 'periode']);
        });
    }
};
