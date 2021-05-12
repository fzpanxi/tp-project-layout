<?php


namespace app\library\error;


use Throwable;

class Error extends \Exception
{
    private $error;

    function __construct(object $error)
    {
        parent::__construct('', 0, null);
        $this->error = $error;
    }

    /**
     * 获取异常详情
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }
}