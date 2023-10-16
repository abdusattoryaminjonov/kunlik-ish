<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viloyat extends Model
{
    protected $table="regions";

    public function tumanlari()
    {
        return $this->hasMany(Tuman::class,'region_id');
    }
}
