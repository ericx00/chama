<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'amount',
        'interest_rate',
        'status',
        'approved_date',
        'approval_notes',
        'due_date',
        'balance_remaining',
    ];

    protected $casts = [
        'approved_date' => 'date',
        'due_date' => 'date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function repayments()
    {
        return $this->hasMany(Repayment::class);
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    public function getTotalRepaidAttribute()
    {
        return $this->repayments()->sum('amount');
    }
}
