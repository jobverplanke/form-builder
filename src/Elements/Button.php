<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Elements;

use JobVerplanke\FormBuilder\FieldControl;

/**
 * Class Button
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Button extends FieldControl
{
    /**
     * @var string
     */
    protected string $type = self::BUTTON;

    /**
     * Button constructor.
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
    public static function make(string $name = ''): Button
    {
        return new static($name);
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function type(string $type): Button
    {
        $this->setAttribute('type', $type);

        return $this;
    }

    /**
     * @return $this
     */
    public function submit(): Button
    {
        $this->type('submit');

        return $this;
    }

    /**
     * Overwritten method from parent.
     * @see FieldControl::value()
     *
     * @param string $value
     *
     * @return $this
     */
    public function value(string $value): Button
    {
        $this->setValue($value);

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
