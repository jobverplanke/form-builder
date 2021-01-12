<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

use JobVerplanke\FormBuilder\FieldControl;

/**
 * Class Text
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Text extends FieldControl
{
    /**
     * @var string
     */
    protected string $type = self::INPUT_TEXT;

    /**
     * Text constructor.
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
    public static function make(string $name = ''): Text
    {
        return new static($name);
    }

    /**
     * @param int $length
     *
     * @return \JobVerplanke\FormBuilder\Fields\Text
     */
    public function maxLength(int $length): Text
    {
        $this->setAttribute('maxlength', $length);

        return $this;
    }

    /**
     * @param int $length
     *
     * @return \JobVerplanke\FormBuilder\Fields\Text
     */
    public function minLength(int $length): Text
    {
        $this->setAttribute('maxlength', $length);

        return $this;
    }

    /**
     * @param int $value
     *
     * @return \JobVerplanke\FormBuilder\Fields\Text
     */
    public function size(int $value): Text
    {
        $this->setAttribute('size', $value);

        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->renderField();
    }
}
