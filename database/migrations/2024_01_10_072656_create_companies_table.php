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
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');    // Arabic name for the company
            $table->string('company_name_en')->nullable(); // English name for the company
            $table->string('license_number')->unique();
            $table->string('status')->default('Pending');
            $table->text('about')->nullable();
            $table->text('about_en')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
        $table->dropColumn('status');
    }
};



