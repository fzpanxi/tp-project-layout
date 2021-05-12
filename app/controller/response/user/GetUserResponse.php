<?php


namespace app\controller\response\user;
use Tebru\Gson\Annotation as Gson;
use Tebru\Gson\Annotation\SerializedName;

class GetUserResponse
{
    /**
     * @Gson\Type("int")
     * @SerializedName("user_id")
     */
    private $userID;
    private $mobile;
    private $nickname;
    private $avatar;

    /**
     * @return mixed
     */
    public function getUserID() : int
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID(int $userID): void
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getMobile() : string
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getNickname() : string
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getAvatar() : string
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }
}