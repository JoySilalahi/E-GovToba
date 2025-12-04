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
        Schema::table('district_news', function (Blueprint $table) {
            if (!Schema::hasColumn('district_news', 'district_id')) {
                $table->foreignId('district_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('district_news', 'category')) {
                $table->string('category')->nullable()->after('district_id');
            }
            if (!Schema::hasColumn('district_news', 'title')) {
                $table->string('title')->nullable()->after('category');
            }
            if (!Schema::hasColumn('district_news', 'excerpt')) {
                $table->text('excerpt')->nullable()->after('title');
            }
            if (!Schema::hasColumn('district_news', 'content')) {
                $table->longText('content')->nullable()->after('excerpt');
            }
            if (!Schema::hasColumn('district_news', 'published_at')) {
                $table->timestamp('published_at')->nullable()->after('content')->useCurrent();
            }
            if (!Schema::hasColumn('district_news', 'published_by')) {
                $table->foreignId('published_by')->nullable()->after('published_at')->constrained('users')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('district_news', function (Blueprint $table) {
            if (Schema::hasColumn('district_news', 'district_id')) {
                $table->dropForeign(['district_id']);
                $table->dropColumn('district_id');
            }
            if (Schema::hasColumn('district_news', 'published_by')) {
                $table->dropForeign(['published_by']);
                $table->dropColumn('published_by');
            }
            $table->dropColumn(['category', 'title', 'excerpt', 'content', 'published_at']);
        });
    }
};
