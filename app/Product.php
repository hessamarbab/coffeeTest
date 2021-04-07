<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
