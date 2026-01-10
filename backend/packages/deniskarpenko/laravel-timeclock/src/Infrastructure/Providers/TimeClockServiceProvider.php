<?php

declare(strict_types=1);

namespace Deniskarpenko\Timeclock\Infrastructure\Providers;

use Illuminate;
use  Illuminate\Support\ServiceProvider;

class TimeClockServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../../database/migrations');

        $this->publishes([
            __DIR__ . '/../../../database/migrations' => database_path('migrations'),
        ], 'time-tracking-migrations');
    }
}
