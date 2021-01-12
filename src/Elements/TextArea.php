<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Elements;

use JobVerplanke\FormBuilder\FieldControl;

/**
 * Class TextArea
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class TextArea extends FieldControl
{
    /**
     * @var string
     */
    protected string $type = self::TEXTAREA;

    /**
     * TextArea constructor.
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
    public static function make(string $name = ''): TextArea
    {
        return new static($name);
    }

    /**
     * Overwritten method from parent.
     * @see FieldControl::value()
     *
     * @param string $value
     *
     * @return $this
     */
    public function value(string $value): TextArea
    {
        $this->setValue($value);

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function columns(int $value): TextArea
    {
        $this->setAttribute('cols', $value);

        return $this;
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function rows(int $value): TextArea
    {
        $this->setAttribute('rows', $value);

        return $this;
    }

    /**
     * @param int $length
     *
     * @return $this
     */
    public function maxLength(int $length): TextArea
    {
        $this->setAttribute('maxlength', $length);

        return $this;
    }

    /**
     * @param int $length
     *
     * @return $this
     */
    public function minLength(int $length): TextArea
    {
        $this->setAttribute('minlength', $length);

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
