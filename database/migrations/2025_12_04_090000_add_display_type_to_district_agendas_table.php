<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('district_agendas', function (Blueprint $table) {
            $table->enum('display_type', ['berita', 'pengumuman'])->default('berita')->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('district_agendas', function (Blueprint $table) {
            $table->dropColumn('display_type');
        });
    }
};
