<?php


namespace ProxerPHP\Api;


class ApiResponse {

    /** @var int $error */
    private $error;
    /** @var string $message */
    private $message;
    /** @var int $code */
    private $code;
    /** @var array $data */
    private $data;

    /**
     * @param array $responseJSON JSON-Antwort von der API
     */
    public function __construct(array $responseJSON) {
        $this->error   = $responseJSON['error'];
        $this->message = $responseJSON['message'];
        $this->code    = $responseJSON['code'] ?? 0;
        $this->data    = $responseJSON['data'] ?? [];
    }

    /**
     * Ob die API einen fehlercode zurueckgegeben hat.
     *
     * @return bool
     */
    public function hasFailed(): bool {
        return $this->error === 1;
    }

    /**
     * @return int
     */
    public function getCode(): int {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * @return array|string
     */
    public function getData() {
        return $this->data;
    }

}