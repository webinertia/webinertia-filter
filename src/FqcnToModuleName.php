<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\Filter;

use function strpos;
use function substr;

final class FqcnToModuleName implements Filter\FilterInterface
{
    /** @param mixed $value */
    public function filter($value): string
    {
        $value = (string) $value;
        return substr($value, 0, strpos($value, '\\'));
    }
}
