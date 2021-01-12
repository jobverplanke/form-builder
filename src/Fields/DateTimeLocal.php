<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

/**
 * Class Date
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class DateTimeLocal extends Date
{
    /**
     * @var string
     */
    protected string $type = self::INPUT_DATETIME_LOCAL;
}
