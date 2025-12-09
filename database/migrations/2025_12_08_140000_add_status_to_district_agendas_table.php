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
        Schema::table('district_agendas', function (Blueprint $table) {
            // Add status field if it doesn't exist
            if (!Schema::hasColumn('district_agendas', 'status')) {
                $table->enum('status', ['mendatang', 'selesai'])->default('mendatang')->after('display_type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('district_agendas', function (Blueprint $table) {
            if (Schema::hasColumn('district_agendas', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
