<?php
declare(strict_types=1);

namespace BSP\DrWatson;

use MyCLabs\Enum\Enum;

/**
 * @method static ExceptionType INPUT()
 * @method static ExceptionType DOMAIN()
 * @method static ExceptionType INTERNAL()
 */
final class ExceptionType extends Enum
{
    private const INPUT = 'input';
    private const DOMAIN = 'domain';
    private const INTERNAL = 'internal';
}
