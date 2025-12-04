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
        Schema::table('district_announcements', function (Blueprint $table) {
            $table->foreignId('district_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable()->after('district_id');
            $table->longText('content')->nullable()->after('title');
            $table->timestamp('published_at')->nullable()->after('content')->useCurrent();
            $table->foreignId('published_by')->nullable()->after('published_at')->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('district_announcements', function (Blueprint $table) {
            $table->dropForeign(['district_id']);
            $table->dropForeign(['published_by']);
            $table->dropColumn(['district_id', 'title', 'content', 'published_at', 'published_by']);
        });
    }
};
