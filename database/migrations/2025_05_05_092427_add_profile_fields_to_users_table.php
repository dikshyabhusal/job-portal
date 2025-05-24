<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->string('company_industry')->nullable();
            $table->string('company_contact')->nullable();
            $table->string('plain_password')->nullable(); // Optional
        });
    }
    
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['company_name', 'company_industry', 'company_contact', 'plain_password']);
        });
    }
};
