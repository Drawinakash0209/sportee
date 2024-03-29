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
        Schema::create('indoors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
            ->onDelete('cascade');
            $table->string('title');
            $table->string('photo')->nullable();
            $table->string('tags');
            $table->string('location');
            $table->string('email');
            $table->string('website');
            $table->longText('description');
            $table->string('contact_number');
            $table->string('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indoors');
    }
};
