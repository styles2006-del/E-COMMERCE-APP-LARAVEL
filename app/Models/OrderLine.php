<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
class OrderLine extends Pivot
{
    protected $table = 'order_lines';
    protected $fillable = ['order_id', 'article_id', 'quantity', 'price', 'amount'];
}
