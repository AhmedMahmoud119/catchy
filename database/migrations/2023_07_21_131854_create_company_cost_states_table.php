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
        Schema::create('company_cost_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_company_cost_id')->constrained()->on('shipping_company_costs');
            $table->foreignId('state_id')->constrained()->on('states');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_cost_states');
    }
};
