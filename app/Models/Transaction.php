<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'transaction_type',
        'transaction_amount',
        'transaction_date',
        'transaction_reason'
    ];

    protected $primaryKey = 'transaction_id';
}
