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
        Schema::create('researchers', function (Blueprint $table) {
            $table->id();
            $table->char('dni', 8)->unique();
            $table->string('first_name', 100);
            $table->string('last_name_father', 100);
            $table->string('last_name_mother', 100);
            $table->string('academic_department', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researchers');
    }
};
