<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('title');

            $table->string('brand');

            $table->string('model');

            $table->year('year');

            $table->decimal('price', 12, 2);

            $table->unsignedInteger('mileage')->default(0);

            $table->string('transmission');

            $table->string('fuel_type');

            $table->string('location');

            $table->text('description');

            $table->string('status')->default('available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};