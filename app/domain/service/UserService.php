<?php


namespace app\domain\service;


use app\domain\entity\UserEntity;
use app\domain\repository\UserRepo;
use app\library\error\Error;
use app\library\error\NotFound;


class UserService
{
    private $repo;

    function __construct(UserRepo $repo)
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
            // db query
            $user = $this->repo->getUser($userID);
        }
        if (!$user->getUserID()) {
            // not found
            throw new Error(new NotFound('user is not found'));
        }
        return $user;
    }
}