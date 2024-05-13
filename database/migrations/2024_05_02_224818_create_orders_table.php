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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained("users")->nullOnDelete();
            $table->string('number')->unique();
            $table->enum('status', ['pending', 'processing', 'completed', 'declined'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
            $table->string('payment_id')->nullable();
            $table->enum('type', ['onsite', 'delivery'])->nullable();
            $table->integer('total')->default(0);
            $table->integer('shipping')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
