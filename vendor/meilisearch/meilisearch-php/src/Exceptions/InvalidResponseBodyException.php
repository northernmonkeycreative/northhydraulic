<?php

declare(strict_types=1);

namespace MeiliSearch\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

class InvalidResponseBodyException extends Exception
{
    public $httpStatus = 0;
    public $httpBody = null;
    public $message = null;

    public function __construct(ResponseInterface $response, $httpBody, $previous = null)
    {
        $this->httpStatus = $response->getStatusCode();
        $this->httpBody = $httpBody;
        $this->message = $this->getMessageFromHttpBody() ?? $response->getReasonPhrase();

        parent::__construct($this->message, $this->httpStatus, $previous);
    }

    public function __toString()
    {
        $base = 'MeiliSearch InvalidResponseBodyException: Http Status: '.$this->httpStatus;

        if ($this->message) {
            $base .= ' - Message: '.$this->message;
        }

        return $base;
    }

    public function getMessageFromHttpBody(): ?string
    {
        if (null !== $this->httpBody) {
            $rawText = strip_tags($this->httpBody);

            if (!ctype_space($rawText)) {
                return substr(trim($rawText), 0, 100);
            }
        }

        return null;
    }
}
