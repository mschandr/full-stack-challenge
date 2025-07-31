<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @todo this array should probably be sorted alphabetically but someone else can do that.
     */
    public function up(): void
    {
        $foreignKeys = [
            'users' => function (Blueprint $table) {
                $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('set null');
                $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null');
                $table->foreign('updated_by')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null');
            },
            'companies' => function (Blueprint $table) {
                $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->nullOnDelete();
                $table->foreign('updated_by')
                    ->references('id')
                    ->on('users')
                    ->nullOnDelete();
            },
            'job_postings' => function (Blueprint $table) {
                $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->cascadeOnDelete();
                $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->nullOnDelete();
                $table->foreign('updated_by')
                    ->references('id')
                    ->on('users')
                    ->nullOnDelete();
            },
            'resumes'   => function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();
            },
            'applications' => function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();
                $table->foreign('job_id')
                    ->references('id')
                    ->on('job_postings')
                    ->cascadeOnDelete();
                $table->foreign('resume_id')
                    ->references('id')
                    ->on('resumes')
                    ->cascadeOnDelete();
            },
            'emails'    => function (Blueprint $table) {
                $table->foreign('recipient_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();
                $table->foreign('sender_id')
                    ->references('id')
                    ->on('users')
                    ->nullOnDelete();
                $table->foreign('application_id')
                    ->references('id')
                    ->on('applications')
                    ->nullOnDelete();
            }
        ];

        foreach ($foreignKeys as $table => $callback) {
            Schema::table($table, $callback);
        }
    }

    /**
     * Reverse the migrations.
     * @todo this array should also be sorted alphabetically
     */
    public function down(): void
    {
        $foreignKeys = [
            'users' => function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropForeign(['created_by']);
                $table->dropForeign(['updated_by']);
            },
            'companies' => function (Blueprint $table) {
                $table->dropForeign(['created_by']);
                $table->dropForeign(['updated_by']);
            },
            'job_postings' => function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropForeign(['created_by']);
                $table->dropForeign(['updated_by']);
            },
            'resumes' => function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            },
            'applications' => function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['job_id']);
                $table->dropForeign(['resume_id']);
            },
            'emails' => function (Blueprint $table) {
                $table->dropForeign(['recipient_id']);
                $table->dropForeign(['sender_id']);
                $table->dropForeign(['application_id']);
            }
        ];
        foreach ($foreignKeys as $table => $callback) {
            Schema::table($table, $callback);
        }
    }
};
