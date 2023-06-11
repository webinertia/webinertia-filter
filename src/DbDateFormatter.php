<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\Filter;

use function explode;

final class DbDateFormatter implements Filter\FilterInterface
{
    /** @var string $date */
    protected $date;

    public function filter($date): string
    {
        $parts = explode('-', $date);
        $year  = $parts[0];
        $month = $parts[1];
        $day   = $parts[2];
        $this->date = $month . '-' . $day . '-' . $year;
        return $this->date;
    }
}
