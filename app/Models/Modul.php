<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'order_no',
    ];

    // Relasi ke Course
    public function kursuses()
    {
        return $this->belongsTo(Kursus::class);
    }

    // Relasi ke Lesson
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
