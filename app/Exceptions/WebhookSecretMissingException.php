<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class WebhookSecretMissingException extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Webhook secret is missing. Please provide one in your `turn14.php` config file.';
}
