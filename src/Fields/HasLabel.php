<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Fields;

use JobVerplanke\FormBuilder\Elements\Label;

/**
 * Trait HasLabel
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
trait HasLabel
{
    /**
     * @var string
     */
    protected string $label;

    /**
     * @param string $label
     * @param string $class
     *
     * @return \JobVerplanke\FormBuilder\Fields\HasLabel
     */
    public function label(string $label = '', string $class = ''): self
    {
        $label = Label::make($label);

        if ($this->hasAttribute('id')) {
            $label = $label->for($this->getAttribute('id'));
        }

        $label = (! empty($class)) ? $label->class($class) : $label;

        $this->setLabel($label->render());

        return $this;
    }

    /**
     * @return string
     */
    protected function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return bool
     */
    protected function hasLabel(): bool
    {
        return isset($this->label);
    }
}
