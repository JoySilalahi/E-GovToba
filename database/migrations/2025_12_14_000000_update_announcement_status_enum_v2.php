<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Using raw SQL to modify enum column
        DB::statement("ALTER TABLE announcements MODIFY COLUMN status ENUM('pending', 'progress', 'done', 'published') NOT NULL DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original values
        DB::statement("UPDATE announcements SET status = 'done' WHERE status = 'published'");
        DB::statement("ALTER TABLE announcements MODIFY COLUMN status ENUM('pending', 'progress', 'done') NOT NULL DEFAULT 'pending'");
    }
};