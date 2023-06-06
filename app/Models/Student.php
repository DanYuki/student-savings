<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'student_class',
        'student_nisn',
        'date_of_birth',
        'student_gender',
        'saving_balance'
    ];

    protected $primaryKey = 'student_id';
}
