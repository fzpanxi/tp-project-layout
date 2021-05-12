<?php


namespace app\application\service;



use app\controller\response\user\GetUserResponse;
use app\domain\service\UserService;

class UserApplication
{
    private $service;
    function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * 获取单个用户信息
     * @param int $userID
     * @return GetUserResponse
     */
    public function getUser(int $userID) : GetUserResponse
    {
        $user = $this->service->getUser($userID);
        $getUserResponse = new GetUserResponse();
        $getUserResponse->setUserID($user->getUserID());
        $getUserResponse->setMobile($user->getMobile());
        $getUserResponse->setNickname($user->getNickname());
        $getUserResponse->setAvatar($user->getAvatar());
        return $getUserResponse;
    }
}