<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'id_number',
        'address',
        'email',
        'date_joined',
        'status',
    ];

    protected $casts = [
        'date_joined' => 'date',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'member_id');
    }

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function repayments()
    {
        return $this->hasMany(Repayment::class);
    }

    public function getTotalContributionsAttribute()
    {
        return $this->contributions()->sum('amount');
    }

    public function getTotalLoansAttribute()
    {
        return $this->loans()->where('status', 'approved')->sum('amount');
    }

    public function getOutstandingLoanAttribute()
    {
        return $this->loans()
            ->where('status', 'approved')
            ->sum('balance_remaining');
    }
}
