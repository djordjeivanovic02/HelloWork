<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_info';
    
    protected $fillable = [
        'user_id',
        'age',
        'professional_title',
        'skills',
        'experience',
        'languages',
        'current_salary',
        'education',
        'about',
        'responsibilities',
        'social_medias',
        'expected_salary',
        'phone',
        'country',
        'postcode',
        'city',
        'full_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
