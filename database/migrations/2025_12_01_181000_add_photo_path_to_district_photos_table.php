<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        if (! Schema::hasTable('district_photos')) {
            Schema::create('district_photos', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        if (Schema::hasTable('district_photos') && ! Schema::hasColumn('district_photos', 'photo_path')) {
            Schema::table('district_photos', function (Blueprint $table) {
                // SQLite does not support ->after(), but it's harmless to include on other DBs
                $table->string('photo_path')->nullable();
            });
        }
    }
    public function down() {
        if (Schema::hasTable('district_photos') && Schema::hasColumn('district_photos', 'photo_path')) {
            Schema::table('district_photos', function (Blueprint $table) {
                // Note: dropping columns on SQLite may not be supported in older versions
                try {
                    $table->dropColumn('photo_path');
                } catch (\Exception $e) {
                    // ignore; manual cleanup may be required
                }
            });
        }
    }
};
