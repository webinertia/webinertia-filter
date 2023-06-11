<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\Filter;

final class LabelToTitle implements Filter\FilterInterface
{
    /** @var Filter\FilterChain $filterChain */
    protected $filterChain;

    public function __construct()
    {
        $this->filterChain = new Filter\FilterChain();
        $this->filterChain->attach(new Filter\StringToLower())->attach(new Filter\Word\SeparatorToDash(' '));
    }
    /** @inheritDoc */
    public function filter($value)
    {
        return $this->filterChain->filter($value);
    }
}
