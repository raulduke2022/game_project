<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function isDone()
    {
        return $this->getAttribute('is_done');
    }

    protected $dates = ['operation_date', 'operation_pay_date'];

    public function setOperationDateAttribute($value)
    {
        $this->attributes['operation_date'] = Carbon::createFromFormat('d.m.Y H:i:s', $value);
    }

    public function setOperationPayDateAttribute($value)
    {
        $this->attributes['operation_pay_date'] = Carbon::createFromFormat('d.m.Y H:i:s', $value);
    }
}
