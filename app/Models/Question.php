<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_id',
        'question_text',
        'type',
        'points',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer'
    ];

    // =====================================
    // TAMBAHKAN KODE INI DI BAWAH
    // =====================================

    // Pertanyaan ini milik sebuah Assessment (Belongs To)
    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
