<?php

declare(strict_types=1);

namespace JobVerplanke\FormBuilder;

use Illuminate\Support\ServiceProvider;

/**
 * Class FormBuilderServiceProvider
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class FormBuilderServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form-builder');
    }

    /**
     * @return void
     */
    public function register(): void
    {

    }
}
