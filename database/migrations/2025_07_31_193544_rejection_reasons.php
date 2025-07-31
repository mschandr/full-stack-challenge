<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rejection_reasons', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('company_id')->nullable()->index(); // null = system-defined
            $table->string('code')->index();                 // e.g., "underqualified"
            $table->text('prompt');                          // LLM input
            $table->boolean('default')->default(false);      // true = system default reason

            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rejection_reasons');
    }
};
