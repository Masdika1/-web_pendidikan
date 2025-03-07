<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = [
        'kursus_id',
        'title',
        'description',
        'order_no',
    ];

    // Relasi ke Course
    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }

    // Relasi ke Lesson
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'module_id');
    }
}
