<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type'
    ];
    public const  types=[
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
