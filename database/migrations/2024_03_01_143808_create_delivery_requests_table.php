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
        Schema::create('delivery_requests', function (Blueprint $table) {
            $table->id();
            $table->string('collection_address')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('one_off_fee')->nullable();
            $table->string('total_miles')->nullable();
            $table->string('delivery_region')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('fuel')->nullable();
            $table->string('delivery_weight')->nullable();
            $table->string('no_of_items')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_requests');
    }
};
