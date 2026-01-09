<?php

declare(strict_types=1);

namespace Deniskarpenko\Timeclock\Infrastructure\Providers;

use Illuminate;
use  Illuminate\Support\ServiceProvider;

class TimeClockServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Загрузка миграций из пакета
        $this->loadMigrationsFrom(__DIR__ . '/../../../database/migrations');

        // Публикация миграций (опционально)
        $this->publishes([
            __DIR__ . '/../../../database/migrations' => database_path('migrations'),
        ], 'time-tracking-migrations');
    }
}
