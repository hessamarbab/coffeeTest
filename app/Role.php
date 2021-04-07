<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Stringable;

class Role extends Model
{
    protected $fillable = [
        'type'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function is($type)
    {
        return ($type == $this->type);
    }
}
