<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Elements;

use JobVerplanke\FormBuilder\FieldControl;
use JobVerplanke\FormBuilder\Fields\Hidden;

/**
 * Class Trix
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Trix extends FieldControl
{
    /**
     * @var \JobVerplanke\FormBuilder\Fields\Hidden
     */
    private Hidden $hiddenElement;

    /**
     * @var string
     */
    protected string $type = self::TRIX;

    /**
     * @return static
     */
    public static function make(): Trix
    {
        return new static();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render(): string
    {
        if (! isset($this->hiddenElement)) {
            $this->hidden();
        }

        $this->setAttribute('input', $this->hiddenElement->getAttribute('id'));

        return $this->hiddenElement.$this->renderElement();
    }

    /**
     * Set trix-editor element input attribute value and hidden input id attribute value.
     *
     * @param string $hidden
     *
     * @return $this
     */
    public function hidden(string $hidden = ''): Trix
    {
        $id = ! empty($hidden) ? $hidden : 'trix-content';

        $this->hiddenElement = Hidden::make('content')->id($id);

        return $this;
    }
}
