<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 *  choices can customize products
 */
class Choice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','option_id'
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
    public function orders(Type $var = null)
    {
        return $this->belongsTo(Order::class)
    }
}
