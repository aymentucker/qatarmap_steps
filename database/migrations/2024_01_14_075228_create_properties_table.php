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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->string('property_name');
            $table->string('property_type');
            $table->string('categories');
            $table->string('city');
            $table->string('region');
            $table->integer('floor');
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->string('furnishing');
            $table->string('ad_type');
            $table->decimal('property_area', 10, 2);
            $table->decimal('price', 10, 2);
            $table->text('description');
            // $table->text('pictures'); // JSON format or string for single picture
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

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
