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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('allusers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cause');
            $table->string('title');
            $table->text('description');   
            $table->decimal('goal_amount', 10, 2);
            $table->decimal('current_amount', 10, 2)->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('beneficiary_name');
            $table->integer('beneficiary_age');
            $table->string('beneficiary_city');
            $table->string('beneficiary_mobile');
            $table->enum('status', ['active', 'inactive','pending'])->default('pending');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
