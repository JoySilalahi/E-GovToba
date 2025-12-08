<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('announcements')) {
            Schema::table('announcements', function (Blueprint $table) {
                if (!Schema::hasColumn('announcements', 'category')) {
                    $table->string('category')->nullable()->after('type');
                }
                if (!Schema::hasColumn('announcements', 'effective_date')) {
                    $table->date('effective_date')->nullable()->after('date');
                }
                if (!Schema::hasColumn('announcements', 'end_date')) {
                    $table->date('end_date')->nullable()->after('effective_date');
                }
                if (!Schema::hasColumn('announcements', 'location')) {
                    $table->string('location')->nullable()->after('end_date');
                }
                if (!Schema::hasColumn('announcements', 'contact')) {
                    $table->string('contact')->nullable()->after('location');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('announcements')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->dropColumn(['category', 'effective_date', 'end_date', 'location', 'contact']);
            });
        }
    }
};
