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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->text('description')->nullable();
            $table->decimal('monthly_price', 8, 2);
            $table->date('availability_start')->nullable();
            $table->date('availability_end')->nullable();
            $table->text('rules')->nullable();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable();
            $table->foreignId('landlord_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('state_id')->constrained('states');
            $table->enum('status', ['Available', 'Reserved']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
