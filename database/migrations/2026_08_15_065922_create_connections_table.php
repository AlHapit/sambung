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
        Schema::create('connections', function (Blueprint $table) {
            $table->id();

            $table->foreignId('need_id')
                ->constrained('needs')
                ->restrictOnDelete();

            $table->foreignId('mentor_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('mentee_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->enum('status', [
                'pending',
                'connected',
                'completed',
                'cancelled',
            ])->default('pending');

            $table->timestamp('requested_at');
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};