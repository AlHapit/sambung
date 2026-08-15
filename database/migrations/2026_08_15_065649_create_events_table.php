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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('organizer_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->string('title', 150);
            $table->text('description');
            $table->string('category', 50);
            $table->string('location', 255);

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->dateTime('event_date');

            $table->enum('status', [
                'draft',
                'open',
                'cancelled',
                'completed',
            ])->default('draft');

            $table->unsignedInteger('max_participants')->nullable();

            $table->timestamps();

            $table->index('status');
            $table->index('category');
            $table->index('event_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};