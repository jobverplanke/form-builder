<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder;

use JobVerplanke\FormBuilder\Contracts\Types;
use JobVerplanke\FormBuilder\Exceptions\AttributeNotFoundException;
use JobVerplanke\FormBuilder\Fields\HasLabel;

/**
 * Class Element
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
abstract class Element implements Types
{
    use HasLabel;

    /**
     * @var array
     */
    protected array $attributes = [];

    /**
     * @var string
     */
    protected string $type;

    /**
     * Like element input, the element can have a "self closing" tag.
     *
     * @var bool
     */
    private bool $selfClosing = false;

    /**
     * @var string
     */
    protected string $value = '';

    /**
     * @var array
     */
    protected array $javascript = [];

    /**
     * AbstractElement constructor.
     *
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        $this->setNameAttribute($name);
    }

    /**
     * @return mixed
     */
    abstract public static function make();

    /**
     * @return string
     */
    abstract public function render(): string;

    /**
     * Todo: Handle checkbox attribute.
     *
     * @param string $attribute
     * @param string|int $value
     */
    protected function setAttribute(string $attribute, $value = '')
    {
        if (empty($value)) {
            $value = $attribute;
        }

        $this->attributes[$attribute] = $value;
    }

    /**
     * @param string $attribute
     *
     * @return mixed
     * @throws \Exception
     */
    protected function getAttribute(string $attribute)
    {
        if (! $this->hasAttribute($attribute)) {
            $this->attributeNotFound($attribute);
        }

        return $this->attributes[$attribute];
    }

    /**
     * @return string
     */
    protected function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    protected function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    protected function isSelfClosing(): bool
    {
        return $this->selfClosing;
    }

    /**
     * @param bool $selfClosing
     */
    protected function setSelfClosing(bool $selfClosing): void
    {
        $this->selfClosing = $selfClosing;
    }

    /**
     * @return string
     */
    protected function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return \JobVerplanke\FormBuilder\Element
     */
    protected function setValue(string $value): Element
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param string $attribute
     */
    protected function removeAttribute(string $attribute)
    {
        unset($this->attributes[$attribute]);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    protected function hasAttribute(string $key): bool
    {
        return isset($this->attributes[$key]);
    }

    /**
     * @return string
     */
    protected function renderAttributes(): string
    {
        $attributes = [];

        foreach ($this->attributes as $attribute => $value) {
            $attributes[] = sprintf(
                ' %s="%s"',
                $attribute,
                $this->validate($value)
            );
        }

        return implode('', $attributes);
    }

    /**
     * @param string $name
     */
    private function setNameAttribute(string $name)
    {
        $name = (empty($name) ? $this->getType() : $name);

        $this->setAttribute('name', $name);
    }

    /**
     * @param string $attribute
     *
     * @throws \Exception
     */
    private function attributeNotFound(string $attribute)
    {
        throw new AttributeNotFoundException(sprintf(
                'Attribute "%s" not found.',
                $attribute
            )
        );
    }

    /**
     * @param string|int $value
     *
     * @return string
     */
    private function validate($value): string
    {
        if (! is_string($value)) {
            $value = (string) $value;
        }

        return htmlentities($value, ENT_QUOTES, 'UTF-8');
    }

    /**
     * @return string
     */
    public function renderElement(): string
    {
        $element = (! $this->isSelfClosing())
            ? view('form-builder::element')->render()
            : view('form-builder::self-closing-element')->render();

        if ($this->hasLabel()) {
            $element = $this->getLabel().$element;
        }

        return sprintf(
            $element,
            $this->getType(),
            $this->renderAttributes(),
            $this->getValue(),
            $this->getType()
        );
    }

    /**
     * @return string
     */
    public function renderField(): string
    {
        $field = view('form-builder::field')->render();

        if ($this->hasLabel()) {
            $field = $this->getLabel().$field;
        }

        return sprintf(
            $field,
            $this->getType(),
            $this->renderAttributes(),
        );
    }

    /**
     * @param array $javascript
     *
     * @return array
     */
    protected function addJavaScript(array $javascript): array
    {
        return array_merge($this->javascript, $javascript);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
