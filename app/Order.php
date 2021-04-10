<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
        'product_id',
        'choice_id'
    ];
    /**
     * eloquent relation function to user model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * eloquent relation function to product model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * eloquent relation function to choice model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }
    /**
     * return rules for validation this model in requests class
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'product_id'=>'required|integer|exists:products,id',
            'choice_id'=>'required|integer|exists:choices,id'
        ];
    }
}
