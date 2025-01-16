<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructor_id',
        'title',
        'description',
        'category',
        'price',
        'picture',
    ];

    // Relasi ke User
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    // Relasi ke Module
    public function modules()
    {
        return $this->hasMany(Modul::class, 'kursus_id'); // Foreign key: kursus_id
    }

    // Relasi ke Enrollment
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Relasi ke Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
