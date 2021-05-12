<?php


namespace app\controller\validate;


use think\Validate;

class UserValidate extends Validate
{
    protected $rule = [
        'id' => 'require|number',
    ];
    protected $message = [
        'id.number' =>  'invalid id',
    ];
    protected $scene = [
        'getUser' => ['id'],
    ];
}