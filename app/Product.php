<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * model of products that can order by customers
 */
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','cost','option_id'
    ];
    /**
     * eloquent relation function to option model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
           /**
     * eloquent relation function to order model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
