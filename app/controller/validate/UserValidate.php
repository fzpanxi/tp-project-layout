<?php


namespace app\controller\validate;


use think\Validate;

class UserValidate extends Validate
{
    protected $rule = [
        'user_id' => 'require|number',
    ];
    protected $message = [
        'user_id.number' =>  'invalid user_id',
    ];
    protected $scene = [
        'getUser' => ['user_id'],
    ];
}