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
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Certificate
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }

        /**
     * Relasi ke model Course.
     */
    public function course()
    {
        return $this->belongsTo(kursus::class);
    }
}
