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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->uuid('booking_code');
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->string('name', 50);
            $table->string('contact', 20);
            $table->string('email', 50);
            $table->text('address');
            $table->string('car_brand', 20);
            $table->string('car_type', 20);
            $table->string('reg_num');
            $table->json('service');
            $table->integer('cost');
            $table->text('special_request', 100)->nullable();
            $table->string('assign')->default('none');
            $table->string('status')->default('pending');
            $table->integer('total_payment');
            $table->string('payment_status');
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
