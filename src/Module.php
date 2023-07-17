<?php

declare(strict_types=1);

namespace Webinertia\Filter;

final class Module
{
    public function getConfig(): array
    {
        $configProvider = new ConfigProvider();
        return [
            'service_manager' => $configProvider->getDependencyConfig(),
            'filters'         => $configProvider->getFilterConfig(),
            'filter_config'   => $configProvider->getFilterConfig(),
        ];
    }
}
