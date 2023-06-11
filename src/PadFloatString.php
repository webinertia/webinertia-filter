<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\Filter;

use function is_string;
use function strpos;
use function str_pad;

use const STR_PAD_RIGHT;

class PadFloatString implements Filter\FilterInterface
{
    /**
     * @param string $value
     * @return $string $filteredValue
     * */
    public function filter($value)
    {
        if (! is_string($value)) {
            $value = (string) $value;
        }
        if (strpos($value, '.', -1) === 2) {
            // return the value unpadded since its
            return $value;
        } else {
            $filteredValue = $value .= '0';
        }
        return $filteredValue;
    }
}
