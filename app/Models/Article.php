<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    //

    protected $fillable = ['label','current_price','quantity','description','cover','slug','category_id'];

    // public function label(): Attribute{
    //     return Attribute::make(
    //         get : fn (string $value) => strtoupper($value),
    //         set : fn (string $new_value) => "1",
    //     )->shouldCache();
    // }


    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public $timestamps = false;

    public function orders():BelongsToMany{
        return $this->belongsToMany(Order::class, 'order_lines')->using(OrderLine::class);
    }
}
