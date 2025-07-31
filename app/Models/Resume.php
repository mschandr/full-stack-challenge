<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Resume extends Model
{
    use HasFactory, SoftDeletes;

    public    $incrementing = false;
    protected $keyType      = 'string';

    protected $fillable = [
        'user_id',
        'title',
        'file_path',
        'summary',
    ];

    protected static function booted(): void
    {
        static::creating(function ($resume) {
            $resume->id = $resume->id ?? Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
