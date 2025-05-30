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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('cover_letter')->nullable();
            $table->string('cv')->nullable();
            $table->integer('years_of_experience');
            $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
            $table->timestamps();
            
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
