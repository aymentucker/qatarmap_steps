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
            $table->string('property_name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('property_type');
            // $table->string('city');
            // $table->string('region');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('region_id');
            $table->integer('floor');
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->string('furnishing');
            $table->string('ad_type');
            $table->decimal('property_area', 10, 2);
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->string('status');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); 
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade'); 

        });
        Schema::create('property_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('url');
            $table->timestamps();
    
            $table->foreign('property_id')->references('id')->on('properties');
        });
        Schema::table('properties', function (Blueprint $table) {
            $table->string('property_name_en')->nullable();
            $table->text('description_en')->nullable();
            // Assuming `property_type`, `furnishing`, and `ad_type` columns exist and you're refactoring
            $table->dropColumn(['property_type', 'furnishing', 'ad_type']);
        });

        Schema::create('property_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });
        
        Schema::create('furnishings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });
        
        Schema::create('ad_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->timestamps();
        });
        
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('property_type_id')->after('category_id');
            $table->unsignedBigInteger('furnishing_id')->after('property_type_id');
            $table->unsignedBigInteger('ad_type_id')->after('furnishing_id');
        
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
        Schema::dropIfExists('properties');
        Schema::dropIfExists('property_images');
    }
};
