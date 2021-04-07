<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'name','option_id'
    ];
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
