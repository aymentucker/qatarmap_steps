<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Arabic name
            $table->string('name_en'); // English name
            $table->string('lat_lng'); // Latitude and Longitude
            $table->timestamps();
        });
    }        

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
