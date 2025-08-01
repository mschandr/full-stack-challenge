<?php

namespace App\Models;

use App\Enums\WorkType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class JobPosting extends Model
{
    use HasFactory, SoftDeletes;

    public    $incrementing = false;
    protected $table        = 'job_postings';
    protected $keyType      = 'string';
    protected $fillable = [
        'title',
        'description',
        'location',
        'work_type',
        'company_id',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'work_type' => WorkType::class,
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->id = $model->id ?? Str::uuid();
        });
    }

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function scopeDehydrated($query)
    {
        return $query->where('visible', true)
            ->whereNull('deleted_at')
            ->select(['id', 'title', 'company_id', 'location', 'work_type', 'salary']);
    }
}