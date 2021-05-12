<?php


namespace app\library\error;

use Tebru\Gson\Annotation\Exclude;

class ResourceExhausted
{
    private $code = 8;
    /**
     * @Exclude(deserialize=false)
     */
    private $http = 429;
    private $status = 'RESOURCE_EXHAUSTED';
    private $message = '';
    private $details = [];

    function __construct(string $message, array $fields, int $retryDelaySeconds)
    {
        $this->message = $message;
        $violations = [];
        foreach ($fields as $k => $v) {
            $violations[] = ['subject' => $k, 'description' => $v];
        }
        $this->details[] = ['violations' => $violations];
        $this->details[] = ['retry_delay' => ['seconds' => $retryDelaySeconds]];
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

    /**
     * @return array
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    /**
     * @param array $details
     */
    public function setDetails(array $details): void
    {
        $this->details = $details;
    }

}