<?php


namespace app\domain\repository;


use app\domain\entity\UserEntity;

interface UserRepo
{
    function getUser(int $userID) : UserEntity;
    function getUserByCache(int $userID) : UserEntity;
}