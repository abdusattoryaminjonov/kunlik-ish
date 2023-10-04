<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Davomat extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_start',
        'time_stop',
        'user_id' 
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
        //User_id!! id emas nomini yoki user table degi-> 
        //-> user_id da kelgan id orqali user malumotlarini chiqarish.
    }

}
