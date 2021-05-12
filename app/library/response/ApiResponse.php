<?php


namespace app\library\response;


use Tebru\Gson\Gson;
use think\response\Json;

class ApiResponse
{
    /**
     * API成功返回
     * @param $data
     * @return Json
     */
    public static function success(object $data)
    {
        $jsonBuilder = Gson::builder()->build();
        return json($jsonBuilder->toNormalized($data), 200);
    }

    /**
     * 错误输出
     * @param object $error
     * @return Json
     */
    public static function error(object $error) : Json
    {
        $jsonBuilder = Gson::builder()->build();
        return json($jsonBuilder->toNormalized($error), $error->getHttp());
    }

}