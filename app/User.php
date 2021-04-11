<?php

namespace App;

use App\Jobs\EmailNotifyJob;
use App\Notifications\NoticeStatusChange;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * model for store app users
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roleIs($type)
    {
        return $this->role->is($type);
    }
    public function setRole($type)
    {
        $role=Role::where('type',$type)->firstOrFail();
        $this->forceFill(['role_id'=>$role->id]);
        $this->save();
    }
    /**
     * eloquent relation function to role model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    /**
     * eloquent relation function to order model
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function sendOrderStatusChangeNotification($order){
        $this->notify(new NoticeStatusChange($order));
        // EmailNotifyJob::dispatch(new NoticeStatusChange($order),$this);
    }
}
