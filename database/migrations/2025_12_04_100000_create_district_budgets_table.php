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
        Schema::create('district_budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->string('title'); // e.g., "APBD 2025", "Lampiran APBD 2025"
            $table->string('year'); // e.g., "2025"
            $table->string('file_path'); // Path to uploaded file
            $table->string('file_name'); // Original file name
            $table->string('file_type')->default('pdf'); // File extension
            $table->bigInteger('file_size')->nullable(); // File size in bytes
            $table->text('description')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district_budgets');
    }
};
