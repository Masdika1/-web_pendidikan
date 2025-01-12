<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'issue_date',
        'certificate_code',
    ];
    protected $casts = [
        'issue_date' => 'datetime',
    ];
    // Relasi ke Enrollment
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
