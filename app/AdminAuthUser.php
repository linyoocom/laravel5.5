<?php
namespace App;

use App\Model\AdminUser;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class AdminAuthUser extends AdminUser implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Authorizable,Notifiable;

    public function authUsername(){

    }

    /**
     * 获取密码
     * @return false|string|null
     */
    public function getAuthPassword()
    {
        //$this->password = password_hash('123456',PASSWORD_BCRYPT);    //password_verify($value, $hashedValue); 校验

        return $this->password;
    }
}
