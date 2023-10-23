<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'age',
        'email',
        'phonenumber',
        'password',
        'mark',
        'place'
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

    public function usersCoolPosts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
    public function usersDavomat()
    {
        return $this->hasMany(Davomat::class, 'user_id');
    }
    public function work()
    {
        return $this->hasMany(Work::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'user_job', 'user_id', 'job_id');
    }


    public function tuman()
    {
        return $this->belongsTo(Tuman::class, 'place');
    }
}
