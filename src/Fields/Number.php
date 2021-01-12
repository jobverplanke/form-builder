<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

use JobVerplanke\FormBuilder\FieldControl;

/**
 * Class Number
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Number extends FieldControl
{
    /**
     * @var string
     */
    protected string $type = self::INPUT_NUMBER;

    /**
     * Number constructor.
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
    public static function make(string $name = ''): Number
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
