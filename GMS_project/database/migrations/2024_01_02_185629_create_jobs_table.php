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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('description', 30)->default('in progress');
            $table->string('status', 30);
            $table->string('vehicle_model', 40);
            $table->string('vehicle_type', 40);
            $table->string('pay', 40)->default('undone');
            $table->string('plateNo', 30);

            

            // $table->string('JID', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
