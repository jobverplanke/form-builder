<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder\Contracts;

/**
 * Interface Types
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
interface Types
{
    public const BUTTON = 'button';
    public const FORM = 'form';
    public const LABEL = 'label';
    public const TEXTAREA = 'textarea';
    public const TRIX = 'trix-editor';

    public const INPUT_BUTTON = 'button';
    public const INPUT_CHECKBOX = 'checkbox';
    public const INPUT_COLOR = 'color';
    public const INPUT_DATE = 'date';
    public const INPUT_DATETIME_LOCAL = 'datetime-local';
    public const INPUT_EMAIL = 'email';
    public const INPUT_FILE = 'file';
    public const INPUT_HIDDEN = 'hidden';
    public const INPUT_IMAGE = 'image';
    public const INPUT_MONTH = 'month';
    public const INPUT_NUMBER = 'number';
    public const INPUT_PASSWORD = 'password';
    public const INPUT_RADIO = 'radio';
    public const INPUT_RANGE = 'range';
    public const INPUT_RESET = 'reset';
    public const INPUT_SEARCH = 'search';
    public const INPUT_SUBMIT = 'submit';
    public const INPUT_TEL = 'tel';
    public const INPUT_TEXT = 'text';
    public const INPUT_TIME = 'time';
    public const INPUT_URL = 'url';
    public const INPUT_WEEK = 'week';
}
