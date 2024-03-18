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
        Schema::create('allusers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->enum('sex',['male','female','other'])->default('male');
            $table->string('age');
            $table->string('pan')->unique()->nullable();
            $table->integer('balance')->default(50);
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('profile_picture')->nullable();
            $table->enum('role', ['donor', 'fundraiser'])->default('donor');
            $table->string('password');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allusers');
    }
};
