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
        Schema::create('job', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('title'); // Job Title
            $table->text('description'); // Job Description
            $table->string('location'); // Job Location
            $table->decimal('salary', 10, 2); // Salary
            $table->string('company'); // Company Name
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps(); // Created at and Updated at timestamps
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
