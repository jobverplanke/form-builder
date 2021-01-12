<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

/**
 * Class Email
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Email extends Text
{
    /**
     * @var string
     */
    protected string $type = self::INPUT_EMAIL;
}
