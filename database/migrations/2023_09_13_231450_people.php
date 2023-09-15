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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('direction')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('dni')->nullable();
            $table->timestamp('date_birth')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');

    }
};
