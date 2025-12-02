<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('district_photos', function (Blueprint $table) {
            $table->string('photo_path')->nullable()->after('district_id');
        });
    }
    public function down() {
        Schema::table('district_photos', function (Blueprint $table) {
            $table->dropColumn('photo_path');
        });
    }
};
