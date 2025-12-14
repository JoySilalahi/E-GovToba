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
        
        DB::statement("ALTER TABLE announcements MODIFY COLUMN status VARCHAR(255) NOT NULL DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original values, mapping 'published' to 'done' or 'pending' if necessary to avoid data loss
        // For strict reversion:
        DB::statement("UPDATE announcements SET status = 'done' WHERE status = 'published'");
        DB::statement("ALTER TABLE announcements MODIFY COLUMN status VARCHAR(255) NOT NULL DEFAULT 'pending'");
    }
};
