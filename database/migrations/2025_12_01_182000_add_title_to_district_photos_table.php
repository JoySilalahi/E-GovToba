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

        if (Schema::hasTable('district_photos') && ! Schema::hasColumn('district_photos', 'title')) {
            Schema::table('district_photos', function (Blueprint $table) {
                $table->string('title')->nullable();
            });
        }
    }
    public function down() {
        if (Schema::hasTable('district_photos') && Schema::hasColumn('district_photos', 'title')) {
            Schema::table('district_photos', function (Blueprint $table) {
                try {
                    $table->dropColumn('title');
                } catch (\Exception $e) {
                    // ignore on DBs that don't support drop
                }
            });
        }
    }
};
