<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Elements;

use JobVerplanke\FormBuilder\FieldControl;
use JobVerplanke\FormBuilder\Fields\Hidden;
use RuntimeException;

/**
 * Class Form
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class Form extends FieldControl
{
    private const HTTP_GET = 'GET';
    private const HTTP_POST = 'POST';
    private const HTTP_PUT = 'PUT';
    private const HTTP_PATCH = 'PATCH';
    private const HTTP_DELETE = 'DELETE';

    /**
     * @var string 
     */
    protected string $type = self::FORM;

    /**
     * @var \JobVerplanke\FormBuilder\Fields\Hidden
     */
    private Hidden $hiddenMethod;

    /**
     * @return static
     */
    public static function make(): Form
    {
        return new static();
    }

    /**
     * Default method is POST.
     *
     * @return string
     */
    public function render(): string
    {
        if (! isset($this->attributes['method'])) {
            $this->setAttribute('method', self::HTTP_POST);
        }

        $tags = [sprintf('<form%s>', $this->renderAttributes())];

        if ($this->attributes['method'] !== self::HTTP_GET) {
            $tags[] = $this->token();
        }

        if (isset($this->hiddenMethod)) {
            $tags[] = $this->hiddenMethod;
        }

        return implode(PHP_EOL, $tags);
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function method(string $method): Form
    {
        $this->setAttribute('method', strtoupper($method));

        return $this;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    private function setMethod(string $method): Form
    {
        $this->setAttribute('method', strtoupper($method));

        return $this;
    }

    /**
     * @return $this
     */
    public function post(): Form
    {
        $this->setMethod(self::HTTP_POST);

        return $this;
    }

    /**
     * @return $this
     */
    public function get(): Form
    {
        $this->setMethod(self::HTTP_GET);

        return $this;
    }

    /**
     * @return $this
     */
    public function hiddenPut(): Form
    {
        $this->setHiddenMethod(self::HTTP_PUT);

        return $this;
    }

    /**
     * @return $this
     */
    public function hiddenPatch(): Form
    {
        $this->setHiddenMethod(self::HTTP_PATCH);

        return $this;
    }

    /**
     * @return $this
     */
    public function hiddenDelete(): Form
    {
        $this->setHiddenMethod(self::HTTP_DELETE);

        return $this;
    }

    /**
     * @param string $action
     *
     * @return $this
     */
    public function action(string $action): Form
    {
        $this->setAttribute('action', $action);

        return $this;
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#attr-enctype
     *
     * @param string $type
     *
     * @return $this
     */
    public function encodingType(string $type): Form
    {
        $this->setAttribute('enctype', $type);

        return $this;
    }

    /**
     * @return $this
     */
    public function multipart(): Form
    {
        return $this->encodingType('multipart/form-data');
    }

    /**
     * @param string $target
     *
     * @return $this
     */
    public function target(string $target): Form
    {
        $this->setAttribute('target', $target);

        return $this;
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form#attr-accept-charset
     *
     * @param string $charSet
     *
     * @return $this
     */
    public function acceptCharset(string $charSet): Form
    {
        $this->setAttribute('accept-charset', $charSet);

        return $this;
    }

    /**
     * @param string $rel
     *
     * @return $this
     */
    public function rel(string $rel): Form
    {
        $this->setAttribute('rel', $rel);

        return $this;
    }

    /**
     * @return $this
     */
    public function open(): Form
    {
        return new static();
    }

    /**
     * @return string
     */
    public function close(): string
    {
        return '</form>';
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    protected function setHiddenMethod(string $method): Form
    {
        $this->setMethod(self::HTTP_POST);
        $this->hiddenMethod = Hidden::make('_method')->value($method);

        return $this;
    }

    /**
     * @return \JobVerplanke\FormBuilder\Fields\Hidden
     */
    private function token(): Hidden
    {
        /** @var \Illuminate\Contracts\Session\Session $session */
        $session = resolve('session');

        if (! isset($session)) {
            throw new RuntimeException('Application session store not set.');
        }

        return Hidden::make('_token')->value($session->token());
    }
}
