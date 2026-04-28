<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Append-only audit record of every notable action in the system.
 *
 * Records are created automatically by:
 * - LogActivity middleware (state-changing HTTP requests)
 * - AuthController (login success / failure / logout)
 * - LogsModelActivity trait (Eloquent model lifecycle events)
 */
class ActivityLog extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'subject_type',
        'subject_id',
        'action',
        'description',
        'method',
        'url',
        'ip_address',
        'user_agent',
        'status_code',
        'context',
        'before',
        'after',
    ];

    protected $casts = [
        'context'    => 'array',
        'before'     => 'array',
        'after'      => 'array',
        'status_code'=> 'integer',
        'subject_id' => 'integer',
        'created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subject(): ?Model
    {
        if (! $this->subject_type || ! $this->subject_id) {
            return null;
        }

        if (! class_exists($this->subject_type)) {
            return null;
        }

        return $this->subject_type::find($this->subject_id);
    }

    public function getActorNameAttribute(): string
    {
        return $this->user?->name ?? 'system';
    }
}
