<?php


namespace app\intra\model;


use think\Model;

class UserModel extends Model
{
    // 设置表名
    protected $name = 'user';
    // 设置字段信息
    protected $schema = [
        'id' => 'int',
        'mobile' => 'string',
        'password' => 'string',
        'nickname' => 'string',
        'avatar' => 'string',
        'create_time' => 'datetime',
        'update_time' => 'datetime',
    ];
}