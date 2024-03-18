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
        Schema::create('donations', function (Blueprint $table) {

                $table->id();
                $table->foreignId('donor_id')->constrained('allusers')->onDelete('cascade')->onUpdate('cascade');
                $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade')->onUpdate('cascade');
                $table->decimal('amount', 10, 2);
                $table->date('transaction_date');
                $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
