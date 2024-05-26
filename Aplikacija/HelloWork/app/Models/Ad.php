<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $table = "ads";
    protected $fillable = [
        'title',
        'address',
        'job_type',
        'min_salary',
        'max_salary',
        'job_category',
        'responsibilities',
        'experience',
        'skills',
        'working_time',
        'number_of_jobs_needed',
        'payment_method',
        'description',
        'ad_duration',
        'tags',
        'image'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'applications')->withPivot('status')->withTimestamps();
    }
}
