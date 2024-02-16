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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., 5 properties, 10 properties, 20 employees
            $table->string('type'); // properties, employees, or both for company
            $table->integer('limit'); // numerical limit of the package
            $table->decimal('price', 8, 2); // Adjust precision and scale as needed
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
