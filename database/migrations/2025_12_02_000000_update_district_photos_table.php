<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pastikan kolom tidak ada sebelum menambahkannya (idempotent)
        if (! Schema::hasColumn('district_photos', 'district_id')) {
            Schema::table('district_photos', function (Blueprint $table) {
                // Tambah kolom tanpa constraint FK (lebih aman untuk sqlite)
                $table->unsignedBigInteger('district_id')->nullable()->after('id')->index();
            });
        }

        // Jika Anda butuh kolom tambahan seperti title/photo_path, cek juga:
        if (! Schema::hasColumn('district_photos', 'photo_path')) {
            Schema::table('district_photos', function (Blueprint $table) {
                $table->string('photo_path')->nullable()->after('district_id');
            });
        }
    }

    public function down(): void
    {
        // Hapus kolom hanya bila ada (sqlite/kesalahan rollback aman)
        if (Schema::hasColumn('district_photos', 'photo_path')) {
            Schema::table('district_photos', function (Blueprint $table) {
                $table->dropColumn('photo_path');
            });
        }

        if (Schema::hasColumn('district_photos', 'district_id')) {
            Schema::table('district_photos', function (Blueprint $table) {
                // Note: sqlite kadang tidak mendukung dropColumn lama; jika gagal, hapus manual
                $table->dropColumn('district_id');
            });
        }
    }
};
