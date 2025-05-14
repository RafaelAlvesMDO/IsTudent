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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf');
            $table->string('matriculation');
            $table->string('email');
            $table->string('phone');
            $table->unsignedTinyInteger('renter_quantity');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->decimal('monthly_price', 8, 2);
            $table->enum('payment_form', ['Credit Card', 'Debit Card', 'Bank Slip', 'PIX']);
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('landlord_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserves');
    }
};
