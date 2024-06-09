<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreviousJobs extends Model
{
    use HasFactory;
    
    protected $table = 'user_previous_jobs';

    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'start_year',
        'end_year'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
