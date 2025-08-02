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
        Schema::create('units', function (Blueprint $table) {
    $table->id();
    $table->foreignId('property_id')->constrained()->onDelete('cascade');
    $table->string('name');
    $table->integer('bedroom')->default(0);
    $table->integer('kitchen')->default(0);
    $table->integer('bath')->default(0);
    $table->decimal('rent', 10, 2)->default(0);
    $table->string('rent_type'); // monthly, weekly
    $table->integer('rent_duration')->nullable();
    $table->string('deposit_type')->default('fixed');
    $table->decimal('deposit_amount', 10, 2)->default(0);
    $table->string('late_fee_type')->default('fixed');
    $table->decimal('late_fee_amount', 10, 2)->default(0);
    $table->decimal('incident_receipt_amount', 10, 2)->default(0);
    $table->text('notes')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
