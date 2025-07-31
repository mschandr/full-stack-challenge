<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('user_id')->index();

            $table->string('filename');
            $table->string('path');                 // local, eventually write cloud path
            $table->string('label')->nullable();    // Optional (e.g., "Marketing Resume", "Govt Version")
            $table->timestamp('uploaded_at')->useCurrent();

            $table->timestamps();
            $table->softDeletes();

            // Foreign key relationships (optional for now, define later if needed)
            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
