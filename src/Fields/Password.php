<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

/**
 * Class Password
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Password extends Text
{
    /**
     * @var string
     */
    protected string $type = self::INPUT_PASSWORD;


}
