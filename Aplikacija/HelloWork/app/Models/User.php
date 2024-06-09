<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\SavedAdController;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function companyInfo()
    {
        return $this->hasOne(CompanyInfo::class);
    }

    public function appliedAds()
    {
        return $this->belongsToMany(Ad::class, 'applications');
    }
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
    public function previousJobs()
    {
        return $this->hasMany(UserPreviousJobs::class);
    }
    public function logActivity($type, $description = null)
    {
        $this->activities()->create([
            'activity_type' => $type,
            'description' => $description,
        ]);
    }
    public function activities()
    {
        return $this->hasMany(LastActivity::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function savedAds()
    {
        return $this->hasMany(SavedAd::class);
    }

}
