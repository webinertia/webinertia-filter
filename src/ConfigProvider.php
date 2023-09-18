<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use Laminas\ServiceManager\Factory\InvokableFactory;

final class ConfigProvider
{
    public const UUID_DEFAULT_VERSION = 7;

    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
        ];
    }

    public function getDependencyConfig(): array
    {
        return [
            'factories' => [
                DbDateFormatter::class      => InvokableFactory::class,
                DelimitedString::class      => InvokableFactory::class,
                FqcnToControllerName::class => InvokableFactory::class,
                FqcnToModuleName::class     => InvokableFactory::class,
                LabelToTitle::class         => InvokableFactory::class,
                TitleToLabel::class         => InvokableFactory::class,
                PadFloatString::class       => InvokableFactory::class,
                PasswordHash::class         => InvokableFactory::class,
                RegistrationHash::class     => InvokableFactory::class,
                Uuid::class                 => InvokableFactory::class,
            ],
        ];
    }
}
