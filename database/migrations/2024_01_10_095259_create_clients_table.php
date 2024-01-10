<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateclientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companies_id')->constrained('companies');
            $table->string('identification_number')->unique();
            $table->string('client_name');
            $table->string('phone_number');
            $table->text('address');
            $table->text('notes')->nullable();
            $table->enum('status', ['renter', 'owner', 'seller']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
