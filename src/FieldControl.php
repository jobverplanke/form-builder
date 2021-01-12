<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder;

/**
 * Class FormControl
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
abstract class FieldControl extends Element
{
    /**
     * @param string $id
     *
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function id(string $id): FieldControl
    {
        $this->setAttribute('id', $id);

        return $this;
    }

    /**
     * @param string $class
     *
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function class(string $class): FieldControl
    {
        if ($this->hasAttribute('class')) {
            $class = $this->attributes['class'] . ' ' . $class;
        }

        $this->setAttribute('class', $class);

        return $this;
    }

    /**
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function disabled(): FieldControl
    {
        $this->setAttribute('disabled');

        return $this;
    }

    /**
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function required(): FieldControl
    {
        $this->setAttribute('required');

        return $this;
    }

    /**
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function selected(): FieldControl
    {
        $this->setAttribute('selected');

        return $this;
    }

    /**
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function autofocus(): FieldControl
    {
        $this->setAttribute('autofocus', 'autofocus');

        return $this;
    }

    /**
     * @param string $autocomplete
     *
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function autocomplete(string $autocomplete = 'on'): FieldControl
    {
        $this->setAttribute('autocomplete', $autocomplete);

        return $this;
    }

    /**
     * @param string $placeholder
     *
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function placeholder(string $placeholder): FieldControl
    {
        $this->setAttribute('placeholder', $placeholder);

        return $this;
    }

    /**
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function readOnly(): FieldControl
    {
        $this->setAttribute('readonly');

        return $this;
    }

    /**
     * Can be overwritten.
     *
     * @param string $value
     *
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function value(string $value): FieldControl
    {
        $this->setAttribute('value', $value);

        return $this;
    }

    /**
     * Chainable alias of setAttribute.
     *
     * @see setAttribute
     *
     * @param string $attribute
     * @param string $value
     *
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function attribute(string $attribute, string $value): FieldControl
    {
        $this->setAttribute($attribute, $value);

        return $this;
    }

    /**
     * Chainable alias of removeAttribute
     *
     * @see removeAttribute
     *
     * @param string $attribute
     *
     * @return \JobVerplanke\FormBuilder\FieldControl
     */
    public function remove(string $attribute): FieldControl
    {
        if (! $this->hasAttribute($attribute)) {
            return $this;
        }

        $this->removeAttribute($attribute);

        return $this;
    }
}
