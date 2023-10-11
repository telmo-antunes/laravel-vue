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
        Schema::table('users', function (Blueprint $table) {
            
            // 1. Create new column
            // You probably want to make the new column nullable
            $table->integer('company_id')->unsigned()->nullable()->after('password');
            
            // 2. Create foreign key constraints
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
            // 1. Drop foreign key constraints
            $table->dropForeign(['company_id']);

            // 2. Drop the column
            $table->dropColumn('company_id');
        });
    }
};
