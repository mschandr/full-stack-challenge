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
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('website')->nullable();

            $table->uuid('created_by')->nullable()->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            // Foreign key relationships (optional for now, define later if needed)
            // $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            // $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
