<?php

namespace CarkDigital\Events;

use Statamic\Providers\AddonServiceProvider;
use CarkDigital\Events\Modifiers\InMonth;
use CarkDigital\Events\Modifiers\IsEndOfWeek;
use CarkDigital\Events\Modifiers\IsStartOfWeek;
use CarkDigital\Events\Tags\Events;

class ServiceProvider extends AddonServiceProvider
{
    protected $modifiers = [
        InMonth::class,
        IsEndOfWeek::class,
        IsStartOfWeek::class,
    ];

    protected $routes = [
       'actions' => __DIR__.'/../routes/actions.php',
    ];

    protected $tags = [
        Events::class,
    ];

    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__.'/../resources/fieldsets' => resource_path('fieldsets'),
        ], 'events-fieldsets');
    }
}
