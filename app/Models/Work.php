<?php

namespace App\Models;

use Date;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'place',
        'date',
        'job',
        'workers',
        'price',
        'agreeables'
    ];
    public function scopePopular(Builder $query): void
    {
        $query->where('date', '>', Date::now()->format('Y-m-d'));
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_work', 'work_id', 'user_id');
    }

    public function adress()
    {
        return $this->belongsTo(Adress::class);
    }

    public function tuman()
    {
        return $this->belongsTo(Tuman::class, 'place');
    }
    public function jobrel()
    {
        return $this->belongsTo(Job::class, 'job');
    }
}
