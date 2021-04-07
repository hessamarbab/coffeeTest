<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Role extends Model
{
    protected $fillable = [
        'type'
    ];
    public $types=[
        'manager','customer'
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
