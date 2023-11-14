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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->decimal('price', 10, 2);
            $table->string('stripe_id'); // Stripe ID of Product from Stripe
            $table->text('description');
            $table->text('seo'); // For Google Search Description
            $table->string('image');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false); // Show Featured Product in Home Page if True
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
