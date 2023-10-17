<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobMemo extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title', 'deadline', 'experience', 'tech_stack', 'location',
        'interview_called', 'interview_attended',
        'user_id'
    ];

    // Carbon instance for date format
    protected $dates = ['deadline'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
