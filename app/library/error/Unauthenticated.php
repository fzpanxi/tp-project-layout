<?php


namespace app\library\error;

use Tebru\Gson\Annotation\Exclude;

class Unauthenticated
{
    private $code = 16;
    /**
     * @Exclude(deserialize=false)
     */
    private $http = 401;
    private $status = 'UNAUTHORIZED';
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