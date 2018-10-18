<?php
namespace App;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
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

    // Get the identifier that will be stored in the subject claim of the JWT
    // 获取将存储在JWT主题声明中的标识符
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Return a key value array, containing any custom claims to be added to the JWT
    // 返回一个键值数组，包含要添加到JWT中的任何自定义声明
    public function getJWTCustomClaims()
    {
        return [];
    }
}
