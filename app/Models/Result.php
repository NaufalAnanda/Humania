<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    // 1. TAMBAHKAN 'cheat_details' KE SINI
    protected $fillable = [
        'user_id',
        'assessment_id',
        'score',
        'result_label',
        'status',
        'cheat_count',
        'cheat_details', // <--- Wajib ada agar log tersimpan!
        'ai_analysis'
    ];

    // 2. FITUR TAMBAHAN (Sangat Disarankan)
    // Ini akan otomatis mengubah JSON dari database menjadi Array PHP
    // Jadi di Blade nanti tidak perlu pakai json_decode() lagi.
    protected $casts = [
        'cheat_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
