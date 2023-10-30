<?php

namespace App\Models;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adress()
    {
        return $this->belongsTo(Adress::class);
    }

        public function tuman()
    {
        return $this->belongsTo(Tuman::class, 'place');
    }
}
