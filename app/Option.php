<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * customize option name
 */
class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    /**
     * eloquent relation function to product model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
     /**
     * eloquent relation function to choice model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
