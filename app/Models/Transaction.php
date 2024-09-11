<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'transaction_date',
        'payment_status',
        'midtrans_url',
        'midtrans_booking_code',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function holiday_package(): BelongsTo
    {
        return $this->belongsTo(HolidayPackage::class, 'package_id');
    }
}
