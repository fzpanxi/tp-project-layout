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
     * @return object
     */
    public function getError(): object
    {
        return $this->error;
    }


}