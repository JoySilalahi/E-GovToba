<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('village_id');
            $table->string('title');
            $table->text('content');
            $table->date('date');
            $table->string('type')->default('meeting'); //['meeting', 'program', 'evaluasi']
            $table->string('status')->default('pending'); //['pending', 'progress', 'done']
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
