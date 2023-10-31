<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = [
        'name'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_job', 'job_id', 'user_id');
    }
    public function works()
    {
        return $this->hasMany(Work::class, 'job');
    }
}
