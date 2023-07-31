<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    protected $table = 'games';
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
