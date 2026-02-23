<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'module_id',
    'test_code',
    'duration',
    'category',
    'description'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // ... (kode relasi lainnya biarkan saja)
}
