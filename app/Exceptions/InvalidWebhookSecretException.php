<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class InvalidWebhookSecretException extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Invalid secret provided';
}
