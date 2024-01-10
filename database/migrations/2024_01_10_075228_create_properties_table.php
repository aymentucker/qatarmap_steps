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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->string('city');
            $table->string('region');
            $table->text('description');
            $table->integer('num_bathrooms');
            $table->integer('num_rooms');
            $table->string('type');
            $table->string('furnishing_status');
            $table->decimal('area', 10, 2);
            $table->text('pictures'); // JSON format or string for single picture
            $table->text('address');
            $table->string('status');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
