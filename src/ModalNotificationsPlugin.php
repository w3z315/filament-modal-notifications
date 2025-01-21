<?php

namespace W3z315\ModalNotifications;

use Filament\Contracts\Plugin;
use Filament\Panel;

class ModalNotificationsPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-modal-notifications';
    }

    public function register(Panel|\Filament\Context $panel): void
    {
        $panel->resources([
            Resources\ModalNotificationResource::class,
        ]);
    }

    public function boot(Panel|\Filament\Context $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
