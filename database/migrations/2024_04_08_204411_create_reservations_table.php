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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable()->constrained("users")->nullOnDelete();
            $table->uuid('cookie_id')->nullable();
            $table->integer("number")->unique();
            $table->date("date");
            $table->time('time');
            $table->smallInteger("persons");
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("phone");
            $table->enum("status", ["pending", "confirmed", "cancelled"])->default("pending");
            $table->text("notes")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
