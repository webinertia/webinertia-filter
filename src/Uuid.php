<?php

declare(strict_types=1);

namespace Webinertia\Filter;

use DateTimeImmutable;
use Laminas\Filter;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Ramsey\Uuid\Provider\Node\RandomNodeProvider;
use Ramsey\Uuid\Provider\Node\StaticNodeProvider;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\UuidInterface;

use function is_array;
use function is_string;

final class Uuid extends Filter\AbstractFilter
{

    protected $options = [
        'uuid_version'   => ConfigProvider::UUID_DEFAULT_VERSION,
        'name'           => null, // $value will provide runtime override
        'datetime'       => null,
        'node'           => null, // if null a static value will be generated
        'clock_sequence' => null,
        'node_type'      => null, // honored types static, random, if static and node is not null the node value will be used
        'namespace'      => null, // if null will use current namespace
    ];

    public function __construct(
        ?array $options = null
    ) {
        /**
         * if for whatever reason we get an empty options array, keep the defaults
         */
        if ($options !== null && $options !== []) {
            $this->setOptions($options);
        }
    }

    public function filter($value)
    {
        $version = (int) $this->options['uuid_version'];
        return match($version) {
            7 => $this->buildUuid($version, $value),
            1 => $this->buildUuid($version, $value)
        };
    }

    public function buildUuid(int $version, mixed $value): UuidInterface
    {
        switch($version) {
            case 1:

                break;
            case 3:
            case 5:

                break;
            case 7:
            default:
                return RamseyUuid::uuid7($this->options['datetime']);
            break;
        }
    }
}
