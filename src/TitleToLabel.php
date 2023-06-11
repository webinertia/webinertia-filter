<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\Filter;

final class TitleToLabel implements Filter\FilterInterface
{
    /** @var FilterChain $filterChain */
    protected $filterChain;

    public function __construct()
    {
        $this->filterChain = new Filter\FilterChain();
        $this->filterChain->attach(new Filter\Word\SeparatorToSeparator('-', ' '))->attach(new Filter\UpperCaseWords());
    }
    public function filter($value)
    {
        return $this->filterChain->filter($value);
    }
}
