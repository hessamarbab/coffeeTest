<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Order extends Model
{
     /**
     * The Order situations that is an enum for status attribute.
     *
     * @var array
     */
    public const statuses=[
        'waiting',
        'preparation',
        'ready',
        'delivered'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
        'product_id',
        'choice_id',
        'number'
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
            'choice_id'=>["required","integer","exists:choices,id",
            ]
        ];
    }
    /**
     * check if order request product and choice is compatible
     *
     *
     * @return bool //or throw exception
     */
    public function checkChoice()
    {
        Product::with('option.choices')
            ->findOrFail(
                $this->product_id,['*'],
                "invalid product_id"
            )->option->choices()
                ->findOrFail(
                    $this->choice_id,['*'],
                    "invalid choice_id"
                );
        return true;
    }
    public function changeStatus($status)
    {
        $this->forceFill(["status"=>$status]);
        $this->save();
    }
}
