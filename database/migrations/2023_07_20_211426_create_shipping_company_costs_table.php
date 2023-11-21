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
        Schema::create('shipping_company_costs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('shipping_company_id')->constrained()->on('shipping_companies');

            $table->float('price')->default(0);
            $table->float('refund_price')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_company_costs');
    }
};
