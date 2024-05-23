<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $table = 'company_info';

    protected $fillable = [
        'user_id',
        'logo',
        'size',
        'country',
        'city',
        'address',
        'about',
        'start_date',
        'contact',
        'website',
        'links',
        'category'
    ];

    public function company()
    {
        return $this->belongsTo(User::class);
    }
}
