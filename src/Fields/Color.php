<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

use JobVerplanke\FormBuilder\Exceptions\InvalidColorFormatException;
use JobVerplanke\FormBuilder\FieldControl;

/**
 * Class Color
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Color extends FieldControl
{
    /**
     * @var string
     */
    protected string $type = self::INPUT_COLOR;

    /**
     * @var string
     */
    private string $color;

    /**
     * Color constructor.
     *
     * @param string $name
     *
     * @throws \Exception
     */
    public function __construct(string $name = '')
    {
        parent::__construct($name);
    }

    /**
     * @param string $name
     *
     * @return static
     * @throws \Exception
     */
    public static function make(string $name = ''): Color
    {
        return new static($name);
    }

    /**
     * @param string $value
     *
     * @return \JobVerplanke\FormBuilder\Fields\Color
     * @throws \Exception
     */
    public function value(string $value): Color
    {
        $this->color = $value;

        $this->attribute('value', $value)->ensureHexadecimal();

        return $this;
    }

    /**
     * @return \JobVerplanke\FormBuilder\Fields\Color
     * @throws \Exception
     */
    private function ensureHexadecimal(): Color
    {
        if (substr($this->color, 0, -6) !== '#') {
            $this->invalidColorFormat();
        }

        return $this;
    }

    /**
     * @throws \JobVerplanke\FormBuilder\Exceptions\InvalidColorFormatException
     */
    private function invalidColorFormat()
    {
        throw new InvalidColorFormatException(sprintf(
            'The specified value "%s" does not conform to the required format. The format is "#rrggbb" where rr, gg, bb are two-digit hexadecimal numbers.',
            $this->color
        ));
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->renderField();
    }
}
