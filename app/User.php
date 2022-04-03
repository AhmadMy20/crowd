<?php

namespace App;

use App\Traits\UsesUuid as TraitsUsesUuid;
use App\Trits\UsesUuid;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use TraitsUsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username','role_id',

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

    

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function otp_code()
    {
        return $this->hasOne('App\OtpCode');
    }

    public function isAdmin(){
        if($this->role_id === $this->get_role_admin()){
            return true;
        }
        return false;
    }

    public function get_role_admin(){
        $role = Role::where('name','admin')->first();

        return $role->id;
    }
}
