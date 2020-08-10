<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'update_time';

    public $timestamps = true;
    protected $table = 'admin_user';

    //可批量赋值的字段
    protected $fillable = ['username','email','password','mobile'];

    //关联角色模型 一对多
    public function custom(){
        $this->hasMany("App\Model\Custom","user_id","user_id");
    }

    //多对多关联  pivot属性访问中间表数据(默认只有关联的两个字段)
    public function roles(){
        $this->belongsToMany("App\Model\Role","role_user","user_id","role_id");
    }

}
