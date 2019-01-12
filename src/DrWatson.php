<?php
declare(strict_types=1);

namespace BSP\DrWatson;

use MyCLabs\Enum\Enum;
use Throwable;

/**
 * Class DrWatson
 * @package BSP\DrWatson
 *
 * Add type, suspect and help to \Exception, in order to have easier times when debugging.
 */
final class DrWatson extends \Exception
{
    /**
     * @var Enum
     *
     * You can use \BSP\DrWatson\ExceptionType or create your own Enum.
     * Please visit https://github.com/myclabs/php-enum to learn how.
     */
    private $type;

    /**
     * @var string
     *
     * This is a hint for developpers, should provide a fieldName, class::method, etc...
     * It should point out the best place to start investigation.
     */
    private $suspect;

    /**
     * @var string
     *
     * This message is a hint meant for developpers, explaining reasons for the exception. It should be deeper and
     * more precise than \BSP\DrWatson\DrWatson::$suspect, so do not hesitate to add explanation here, even if it's
     * long text.
     * The more details there is, the easier it will be to debug.
     */
    private $help;

    private function __construct(
        Enum $exceptionType,
        string $message = "",
        string $suspect = "",
        string $help = "",
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->type = $exceptionType;
        $this->suspect = $suspect;
        $this->help = $help;
    }

    /**
     * Named Constructor. DrWatson writes a fine report for you !
     */
    public static function report(
        Enum $drWatsonExceptionType,
        string $message = "",
        string $suspect = "",
        string $help = "",
        int $code = 0,
        Throwable $previous = null
    ): self {
        return new self($drWatsonExceptionType, $message, $suspect, $help, $code, $previous);
    }

    public function type(): Enum
    {
        return $this->type;
    }

    public function message(): string
    {
        return $this->message;
    }

    public function suspect(): string
    {
        return $this->suspect;
    }

    public function help(): string
    {
        return $this->help;
    }

    public function code(): int
    {
        return $this->code;
    }
}
