<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\Filter;

use function abs;
use function gettype;
use function is_string;
use function mb_strlen;
use function sprintf;
use function strrpos;
use function substr;

final class FqcnToControllerName implements Filter\FilterInterface
{
    /** @var string $encoding */
    protected $encoding = 'UTF-8';

    /**
     * @param mixed $value
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function filter($value): string
    {
        if (! is_string($value)) {
            throw new Filter\Exception\InvalidArgumentException(sprintf('Expecting string $value but recieved: %s', [gettype($value)]));
        }
        // extract actual controller class name
        $length       = mb_strlen($value, $this->encoding);
        $lastPosition = strrpos($value, '\\');

        $startSlicePosition = $lastPosition - $length + 1;
        $sliceLength        = abs($startSlicePosition);

        $value = substr($value, $startSlicePosition, $sliceLength);
        if ($sliceLength !== mb_strlen($value, $this->encoding)) {
            throw new Filter\Exception\RuntimeException('$value could not be filtered');
        } else {
            return $value;
        }
    }
}
