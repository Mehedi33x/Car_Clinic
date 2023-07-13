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
            $table->string('name',50);
            $table->string('contact',20);
            $table->string('email',50);
            $table->text('address');
            $table->string('car_brand',20);
            $table->string('car_type',20);
            $table->bigInteger('reg_num');
            $table->string('service',100);
            $table->text('special_request',100);
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
