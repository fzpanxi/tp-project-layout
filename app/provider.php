<?php
use app\library\error\ExceptionHandle;
use app\Request;

// 容器Provider定义文件
return [
    'think\Request'          => Request::class,
    'think\exception\Handle' => ExceptionHandle::class,
];
