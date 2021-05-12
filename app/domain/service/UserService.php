<?php


namespace app\domain\service;


use app\domain\entity\UserEntity;
use app\library\error\Error;
use app\library\error\NotFound;


class UserService
{
    private $repo;

    function __construct($repo)
    {
        $this->repo = $repo;
    }

    /**
     * 获取单个用户信息
     * @param int $userID
     * @return UserEntity
     * @throws Error
     */
    public function getUser(int $userID): UserEntity
    {
        $user = $this->repo->getUserByCache($userID);
        if (!$user->getUserID()) {
            $user = $this->repo->getUser($userID);
        }
        if (!$user->getUserID()) {
            // 未找到用户信息
            throw new Error(new NotFound('user is not found'));
        }
        return $user;
    }
}