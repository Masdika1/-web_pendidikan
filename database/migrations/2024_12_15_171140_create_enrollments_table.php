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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id(); // Primary key: enrollment_id
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kursus_id')->constrained('kursuses')->onDelete('cascade');
            $table->timestamp('enrollment_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('progress')->default(0);
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
