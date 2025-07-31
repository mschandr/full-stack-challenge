<?php

use App\Enums\WorkType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('company_id')->index();
            $table->uuid('created_by')->nullable()->index();
            $table->uuid('updated_by')->nullable()->index();

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location');
            $table->unsignedTinyInteger('work_type')->default(WorkType::ON_SITE->value);

            $table->decimal('salary', 12, 2)->nullable(); // CAD/USD/whatever — no currency enforced
            $table->timestamp('expires_at')->nullable();
            $table->boolean('visible')->default(true);

            $table->timestamps();
            $table->softDeletes();

            // Foreign key relationships (optional for now, define later if needed)
            // $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            // $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            // $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
