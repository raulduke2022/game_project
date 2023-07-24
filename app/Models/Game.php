<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    protected $guarded = [];
//    use HasFactory;

    public function images() {
        return $this->hasMany(Image::class);
    }
}
