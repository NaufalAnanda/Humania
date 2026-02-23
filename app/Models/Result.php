<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    // TAMBAHKAN KODE INI UNTUK MENGIZINKAN PENYIMPANAN DATA
    protected $fillable = [
        'user_id',
        'assessment_id',
        'score',
        'result_label',
        'status',
        'cheat_count',
        'ai_analysis'
    ];

    // (Opsional) Relasi jika Anda butuh memanggil data user dan assessment nanti
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
