<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Email extends Model
{
    use HasFactory, SoftDeletes;

    public    $incrementing = false;
    protected $keyType      = 'string';

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    protected $fillable = [
        'recipient_id',
        'sender_id',
        'application_id',
        'subject',
        'body',
        'sent_at',
    ];

    protected static function booted(): void
    {
        static::creating(function ($email) {
            $email->id = $email->id ?? Str::uuid();
        });
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
