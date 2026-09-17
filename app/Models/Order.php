<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = ['client_id', 'date','delivery_status', 'amount'];
    //
    public function articles():BelongsToMany{
        return $this->belongsToMany(Article::class, 'order_lines')->using(OrderLine::class)->withPivot('quantity', 'price', 'amount');
    }

    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }
}
