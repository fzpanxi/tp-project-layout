<?php


namespace app\library\error;


use library\error\response\ApiResponse;
use think\exception\Handle;
use think\facade\Env;
use think\Response;
use Throwable;

class ExceptionHandle extends Handle
{
    public function render($request, Throwable $e): Response
    {
        // 调试模式直接业务处理
        if (Env::get('APP_DEBUG')) {
            return parent::render($request, $e);
        }
        if ($e instanceof HttpException) {
            if ($e->getStatusCode() == 404) {
                return ApiResponse::error(new NotFound('not found'));
            } else if ($e->getStatusCode() == 500) {
                return ApiResponse::error(new Internal('internal error'));
            }
        }
        return ApiResponse::error(new Internal('internal error'));
    }

}