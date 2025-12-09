<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // jika tabel belum ada, buat struktur minimal agar aman
        if (! Schema::hasTable('district_photos')) {
            Schema::create('district_photos', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        // Tambah kolom hanya jika belum ada (idempotent)
        if (Schema::hasTable('district_photos') && ! Schema::hasColumn('district_photos', 'photo_path')) {
            Schema::table('district_photos', function (Blueprint $table) {
                $table->string('photo_path')->nullable()->after('district_id');
            });
        }

        if (Schema::hasTable('district_photos') && ! Schema::hasColumn('district_photos', 'title')) {
            Schema::table('district_photos', function (Blueprint $table) {
                $table->string('title')->nullable()->after('photo_path');
            });
        }

        if (Schema::hasTable('district_photos') && ! Schema::hasColumn('district_photos', 'description')) {
            Schema::table('district_photos', function (Blueprint $table) {
                $table->text('description')->nullable()->after('title');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('district_photos')) {
            if (Schema::hasColumn('district_photos', 'description')) {
                Schema::table('district_photos', function (Blueprint $table) {
                    $table->dropColumn('description');
                });
            }
            if (Schema::hasColumn('district_photos', 'title')) {
                Schema::table('district_photos', function (Blueprint $table) {
                    $table->dropColumn('title');
                });
            }
            if (Schema::hasColumn('district_photos', 'photo_path')) {
                Schema::table('district_photos', function (Blueprint $table) {
                    $table->dropColumn('photo_path');
                });
            }
        }
    }
};