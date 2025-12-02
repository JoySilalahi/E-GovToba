<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('district_photos', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->nullable()->after('id');
        });
    }
    public function down() {
        Schema::table('district_photos', function (Blueprint $table) {
            $table->dropColumn('district_id');
        });
    }
};
