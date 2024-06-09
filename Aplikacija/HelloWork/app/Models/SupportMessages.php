<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportMessages extends Model
{
    use HasFactory;
    protected $fillable = ['sender_name', 'sender_email', 'message'];
}
