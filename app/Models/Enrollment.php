<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'enrollment_date',
        'progress',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Course
    public function kursuses()
    {
        return $this->belongsTo(Kursus::class);
    }

    // Relasi ke Certificate
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
}
