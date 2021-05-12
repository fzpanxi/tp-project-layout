<?php


namespace app\intra;


use app\domain\entity\UserEntity;
use app\domain\repository\UserRepo;
use app\intra\model\UserData;
use app\intra\model\UserModel;
use app\libs\response\ApiResponse;
use think\db\exception\DataNotFoundException;
use think\Exception;
use think\Facade\Cache;

class UserInfra implements UserRepo
{
    const USER_INFO_CACHE_KEY = 'userInfo:';
    private $db;
    private $cache;

    function __construct()
    {
        $this->db = new UserModel();
        $this->cache = Cache::store('redis')->handler();
    }

    /**
     * 获取单个用户信息
     * @param int $userID
     * @return UserEntity
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \Exception
     */
    public function getUser(int $userID): UserEntity
    {
        $userEntity = new UserEntity();
        $user = $this->db->where(['id' => $userID])->find();
        if ($user) {
            $userEntity->setUserID($user->id);
            $userEntity->setMobile($user->mobile);
            $userEntity->setPassword($user->password);
            $userEntity->setNickname($user->nickname);
            $userEntity->setAvatar($user->avatar);
            $userEntity->setCreateTime($user->create_time);
            $userEntity->setupdateTime($user->update_time);
        }
        return $userEntity;
    }

    /**
     * 缓存获取用户信息
     * @param int $userID
     * @return UserEntity
     */
    public function getUserByCache(int $userID): UserEntity
    {
        $userEntity = new UserEntity();
        $user = $this->cache->hGetAll(self::USER_INFO_CACHE_KEY.$userID);
        if ($user) {
            $user = (object)$user;
            $userEntity->setUserID($user->id);
            $userEntity->setMobile($user->mobile);
            $userEntity->setPassword($user->password);
            $userEntity->setNickname($user->nickname);
            $userEntity->setAvatar($user->avatar);
            $userEntity->setCreateTime($user->create_time);
            $userEntity->setupdateTime($user->update_time);
        }
        return $userEntity;
    }
}