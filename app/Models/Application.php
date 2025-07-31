<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use App\Enums\RejectionReasonCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    public    $incrementing = false;
    protected $keyType      = 'string';

    protected $casts = [
        'status'                => ApplicationStatus::class,
        'candidate_notified_at' => 'datetime',
        'applied_at'            => 'datetime',
        'llm_metadata'          => 'array',
        'rejection_reason_code' => RejectionReasonCode::class,
    ];

    protected $fillable = [
        'user_id',
        'job_id',
        'resume_id',
        'status',
        'cover_letter',
        'message',
        'applied_at',
        'rejection_reason_code',
        'rejection_prompt',
        'candidate_notified_at',
        'llm_metadata',
    ];

    protected static function booted(): void
    {
        static::creating(function ($application) {
            $application->id = $application->id ?? Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(JobPosting::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
