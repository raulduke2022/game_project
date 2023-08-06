<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function setMain() {
        $this->update([
           'is_main' => true
        ]);
    }

    public function unset() {
        $this->update([
            'is_main' => false
        ]);
    }
}
