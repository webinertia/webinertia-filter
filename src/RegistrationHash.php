<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\Filter;

use function gettype;
use function password_hash;

use const PASSWORD_DEFAULT;

final class RegistrationHash extends Filter\AbstractFilter
{
    /**
     * @param array $value ['email' => $email, 'timestamp' => $timestamp]
     */
    public function filter($value): string
    {
        if (! isset($value['email']) && ! isset($value['timestamp'])) {
            throw new Filter\Exception\InvalidArgumentException(
                'Expects $value to associative array with keys: email, timestamp - received: ' . gettype($value)
            );
        }
        return password_hash($value['email'] . $value['timestamp'], PASSWORD_DEFAULT);
    }

    public function __invoke(array $value): string
    {
        return $this->filter($value);
    }
}
