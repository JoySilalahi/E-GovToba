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
        // Skip - tabel sudah ada dari migration sebelumnya
        if (!Schema::hasTable('district_announcements')) {
            Schema::create('district_announcements', function (Blueprint $table) {
                $table->id();
                $table->foreignId('district_id')->constrained()->onDelete('cascade');
                $table->string('title');
                $table->longText('content');
                $table->timestamp('published_at')->useCurrent();
                $table->foreignId('published_by')->nullable()->constrained('users')->onDelete('set null');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district_announcements');
    }
};
