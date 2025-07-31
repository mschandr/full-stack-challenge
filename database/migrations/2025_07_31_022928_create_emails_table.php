<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('recipient_id')->index(); // FK to users
            $table->uuid('sender_id')->nullable()->index(); // Optional FK to users (null = system)
            $table->uuid('application_id')->nullable()->index(); // Optional linkage

            $table->string('subject');
            $table->text('body');
            $table->json('llm_context')->nullable(); // Stored prompt/input for traceability

            $table->timestamp('sent_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Foreign key relationships (optional for now, define later if needed)
            // $table->foreign('recipient_id')->references('id')->on('users')->cascadeOnDelete();
            // $table->foreign('sender_id')->references('id')->on('users')->nullOnDelete();
            // $table->foreign('application_id')->references('id')->on('applications')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
