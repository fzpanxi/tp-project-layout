<?php

namespace app\controller;

use app\BaseController;
use app\controller\validate\UserValidate;
use app\domain\service\UserService;
use app\intra\UserInfra;
use app\application\service\UserApplication;
use app\library\error\Error;
use app\library\error\InvalidArgument;
use app\library\response\ApiResponse;
use think\App;
use think\exception\ValidateException;
use think\Request;

class User extends BaseController
{
    private $userRepo;
    private $userService;
    private $userApplication;

    function __construct(App $app)
    {
        parent::__construct($app);
        $this->userRepo = new UserInfra();
        $this->userService = new UserService($this->userRepo);
        $this->userApplication = new UserApplication($this->userService);
    }

    /**
     * 获取单个用户信息
     * @param Request $request
     * @return \think\response\Json
     */
    public function getUser(Request $request)
    {
        try {
            //参数校验
            validate(UserValidate::class)
                ->batch(true)
                ->scene('getUser')
                ->check($request->param());
            try {
                $user = $this->userApplication->getUser((int)$request->param('id'));
                return ApiResponse::success($user);
            } catch (Error $e) {
                return ApiResponse::error($e->getError());
            }
        } catch (ValidateException $e) {
            return ApiResponse::error(new InvalidArgument($e->getMessage(), $e->getError()));
        }

    }
}
