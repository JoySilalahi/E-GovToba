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
        $driver = DB::connection()->getDriverName();

        if ($driver === 'pgsql') {
            DB::statement("ALTER TABLE announcements ALTER COLUMN status TYPE VARCHAR(255), ALTER COLUMN status SET DEFAULT 'pending', ALTER COLUMN status SET NOT NULL");
        } else {
            DB::statement("ALTER TABLE announcements MODIFY COLUMN status VARCHAR(255) NOT NULL DEFAULT 'pending'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original values
        DB::statement("UPDATE announcements SET status = 'done' WHERE status = 'published'");
        
        $driver = DB::connection()->getDriverName();

        if ($driver === 'pgsql') {
            DB::statement("ALTER TABLE announcements ALTER COLUMN status TYPE VARCHAR(255), ALTER COLUMN status SET DEFAULT 'pending', ALTER COLUMN status SET NOT NULL");
        } else {
            DB::statement("ALTER TABLE announcements MODIFY COLUMN status VARCHAR(255) NOT NULL DEFAULT 'pending'");
        }
    }
};