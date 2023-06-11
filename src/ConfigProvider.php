<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\ServiceManager\Factory;

final class ConfigProvider
{
    public function getDependencyConfig(): array
    {
        return [];
    }

    public function getFilterConfig(): array
    {
        return [
            'factories' => [
                DbDateFormatter::class      => Factory\InvokableFactory::class,
                DelimitedString::class      => Factory\InvokableFactory::class,
                FqcnToControllerName::class => Factory\InvokableFactory::class,
                FqcnToModuleName::class     => Factory\InvokableFactory::class,
                LabelToTitle::class         => Factory\InvokableFactory::class,
                TitleToLabel::class         => Factory\InvokableFactory::class,
                PadFloatString::class       => Factory\InvokableFactory::class,
                Password::class             => Factory\InvokableFactory::class,
                RegistrationHash::class     => Factory\InvokableFactory::class,
            ],
        ];
    }
}
