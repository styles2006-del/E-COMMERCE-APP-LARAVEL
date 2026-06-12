<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = ['delivery_status'];
    //
    public function articles():BelongsToMany{
        return $this->belongsToMany(Article::class, 'order_lines')->using(OrderLine::class);
    }

    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }
}
