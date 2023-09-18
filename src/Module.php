<?php

declare(strict_types=1);

namespace Webinertia\Filter;

final class Module
{
    public function getConfig(): array
    {
        $configProvider = new ConfigProvider();
        return [
            'filters' => $configProvider->getDependencyConfig(),
        ];
    }
}
