<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function setReserved()
    {
        $this->reserved = true;
        $this->save();
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: function (int $value) {
                $price = $value / env('CURR_CENTS', 100) . ' ' . env('CURR', 'RUB');
                return $price;
            }
        );
    }
}
