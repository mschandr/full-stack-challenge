<?php

use App\Enums\ApplicationStatus;
use App\Enums\RejectionReasonCode;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('user_id')->index();
            $table->uuid('job_id')->index();
            $table->uuid('resume_id')->index();

            $table->unsignedTinyInteger('status')->default(ApplicationStatus::SUBMITTED->value);

            $table->text('cover_letter')->nullable();
            $table->text('message')->nullable();

            $table->timestamp('applied_at')->useCurrent();

            $table->string('rejection_reason_code')->nullable(); // e.g., 'underqualified'
            $table->text('rejection_prompt')->nullable();        // Sent to LLM
            $table->timestamp('candidate_notified_at')->nullable();
            $table->json('llm_metadata')->nullable();            // Optional: LLM trace/debug

            $table->timestamps();
            $table->softDeletes();

            // Foreign key relationships (optional for now, define later if needed)
            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            // $table->foreign('job_id')->references('id')->on('jobs')->cascadeOnDelete();
            // $table->foreign('resume_id')->references('id')->on('resumes')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
