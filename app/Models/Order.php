<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function isDone() {
        return $this->getAttribute('is_done');
    }
}
