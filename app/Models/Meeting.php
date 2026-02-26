<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'scheduled_date',
        'location',
        'status',
        'minutes',
        'created_by',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function attendees()
    {
        return $this->belongsToMany(Member::class, 'meeting_attendees');
    }

    public function attachments()
    {
        return $this->hasMany(MeetingAttachment::class);
    }
}
