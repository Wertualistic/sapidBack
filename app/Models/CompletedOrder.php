<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedOrder extends Model
{
    protected $fillable = [
        'id',
    ];

    protected $table = 'completed_orders';

    public function order()
    {
        return $this->belongsTo(Order::class, 'id');
    }
}
