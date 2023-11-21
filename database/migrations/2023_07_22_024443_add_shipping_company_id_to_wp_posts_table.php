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
        Schema::table('wp_posts', function (Blueprint $table) {
            $table->foreignId('shipping_company_id')->nullable()
                ->constrained()->on('shipping_companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wp_posts', function (Blueprint $table) {
            //
        });
    }
};
