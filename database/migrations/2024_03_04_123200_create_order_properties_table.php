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
        Schema::create('order_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('furnishing_id');
            $table->unsignedBigInteger('ad_type_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('region_id');
            $table->integer('floor')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->string('price_min')->nullable();
            $table->string('price_max')->nullable();
            $table->string('property_area_min')->nullable();
            $table->string('property_area_max')->nullable();
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); 
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade'); 
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->foreign('furnishing_id')->references('id')->on('furnishings')->onDelete('cascade');
            $table->foreign('ad_type_id')->references('id')->on('ad_types')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_properties');
    }
};
