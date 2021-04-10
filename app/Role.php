<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * model for store app users role that permissions set by that role
 */
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
    /**
     *  roles that generated in this app
     */
    public const  types=[
        'manager',//who allow to access admin panel
        'customer'//who can order
    ];
    /**
     * eloquent relation function to user model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function is($type)
    {
        return ($type == $this->type);
    }
}
