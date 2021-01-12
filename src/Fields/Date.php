<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

use JobVerplanke\FormBuilder\FieldControl;
use Exception;

/**
 * Class Date
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Date extends FieldControl
{
    /**
     * @var string
     */
    protected string $type = self::INPUT_DATE;

    /**
     * @var string
     */
    private string $pattern = '/^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$/m';

    /**
     * Date constructor.
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
    public static function make(string $name = ''): Date
    {
        return new static($name);
    }

    /**
     * @param string $min
     *
     * @return \JobVerplanke\FormBuilder\Fields\Date
     */
    public function min(string $min): Date
    {
        $this->setAttribute('min', $min);

        return $this;
    }

    /**
     * @param string $max
     *
     * @return \JobVerplanke\FormBuilder\Fields\Date
     */
    public function max(string $max): Date
    {
        $this->setAttribute('max', $max);

        return $this;
    }

    /**
     * @param string $step
     *
     * @return \JobVerplanke\FormBuilder\Fields\Date
     */
    public function step(string $step): Date
    {
        $this->setAttribute('step', $step);

        return $this;
    }

    /**
     * @return \JobVerplanke\FormBuilder\Fields\Date
     */
    public function pattern(): Date
    {
        $this->setAttribute('pattern', $this->pattern);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return \JobVerplanke\FormBuilder\Fields\Date
     * @throws \Exception
     */
    private function validateFormat(string $value): Date
    {
        if (empty($value)) {
            return $this;
        }

        $result = preg_match($this->pattern, $value, $matches);

        if ($result === 0 || ! $result) {
            throw new Exception('Invalid date format.');
        }

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
