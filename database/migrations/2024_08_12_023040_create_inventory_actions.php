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
        Schema::create('inventory_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('inventory');
            $table->enum('action_type', ['added', 'removed', 'adjusted']);
            $table->string('performed_by')->nullable();
            $table->decimal('quantity_changed',8,2)->nullable()->default(null);
            $table->string('reason_for_action')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_actions');
    }
};
