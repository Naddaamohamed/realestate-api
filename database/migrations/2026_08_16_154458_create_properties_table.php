<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {

            $table->id();

            // The user who owns the listing
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('title');

            $table->text('description');

            $table->enum('type', [
                'apartment',
                'villa',
                'office',
                'shop',
                'land',
                'chalet',
            ]);

            $table->enum('purpose', [
                'sale',
                'rent',
            ]);

            $table->decimal('price', 12, 2);

            $table->string('location');

            $table->unsignedInteger('area');

$table->unsignedTinyInteger('bedrooms')->nullable();
$table->unsignedTinyInteger('bathrooms')->nullable();

            $table->enum('status', [
                'available',
                'sold',
                'rented',
            ])->default('available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};