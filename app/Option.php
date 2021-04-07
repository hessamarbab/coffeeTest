<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
