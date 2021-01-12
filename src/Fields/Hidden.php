<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

use JobVerplanke\FormBuilder\FieldControl;

/**
 * Class Hidden
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Hidden extends FieldControl
{
    /**
     * @var string
     */
    protected string $type = self::INPUT_HIDDEN;

    /**
     * Hidden constructor.
     *
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        parent::__construct($name);
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public static function make(string $name = ''): Hidden
    {
        return new static($name);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->renderField();
    }
}
