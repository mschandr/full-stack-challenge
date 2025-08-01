<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class RejectionReason extends Model
{
    use HasFactory;

    public    $incrementing = false;
    protected $table        = 'rejection_reasons';
    protected $keyType      = 'string';

    protected $fillable = [
        'id',
        'company_id',
        'code',      // E.g., 'underqualified'
        'prompt',    // The LLM prompt / reason text
        'default',   // Whether this is a system-wide default reason
    ];

    protected $casts = [
        'default' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->id = $model->id ?? Str::uuid();
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
