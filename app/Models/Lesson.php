<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'content',
        'video_url',
        'order_no',
    ];

    // Relasi ke Module
    public function module()
    {
        return $this->belongsTo(Modul::class, 'module_id'); // Foreign key is `module_id`
    }
}
