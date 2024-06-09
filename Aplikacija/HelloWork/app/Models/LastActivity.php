<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastActivity extends Model
{
    use HasFactory;

    protected $table = 'last_activities';

    protected $fillable = ['user_id', 'activity_type', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
