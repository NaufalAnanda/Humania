<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    // Izinkan pengisian kolom-kolom ini
    protected $fillable = [
        'user_id',
        'assessment_id',
        'question_id',
        'answer_value',
        'is_correct'
    ];
}
