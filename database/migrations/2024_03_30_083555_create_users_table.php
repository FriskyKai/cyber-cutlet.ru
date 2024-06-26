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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthDate');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('nickname')->unique();
            $table->string('password');
            $table->foreignId('team_id')->nullable()->constrained()->onUpdate('cascade');
            $table->string('photoUrl')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
