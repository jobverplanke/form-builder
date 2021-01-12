<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Elements;

use JobVerplanke\FormBuilder\Element;
use JobVerplanke\FormBuilder\FieldControl;

/**
 * Class Label
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Label extends FieldControl
{
    /**
     * @var string
     */
    protected string $type = self::LABEL;

    /**
     * @param string $value
     *
     * @return static
     */
    public static function make(string $value = ''): Label
    {
        return (new static())->setValue($value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function for(string $value): Label
    {
        $this->setAttribute('for', $value);

        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->renderElement();
    }
}
