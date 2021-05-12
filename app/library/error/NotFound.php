<?php


namespace app\library\error;

use Tebru\Gson\Annotation\Exclude;

class NotFound
{
    private $code = 5;
    /**
     * @Exclude(deserialize=false)
     */
    private $http = 404;
    private $status = 'NOT_FOUND';
    private $message = '';

    function __construct(string $message)
    {
        $this->message = $message;
    }
    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getHttp(): int
    {
        return $this->http;
    }

    /**
     * @param int $http
     */
    public function setHttp(int $http): void
    {
        $this->http = $http;
    }
    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }


}