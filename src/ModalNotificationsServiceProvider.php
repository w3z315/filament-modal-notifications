<?php

namespace W3z315\ModalNotifications;

use Filament\Facades\Filament;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Livewire\Livewire;
use Spatie\LaravelMarkdown\MarkdownServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;

class ModalNotificationsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-modal-notifications';

    public static string $viewNamespace = 'filament-modal-notifications';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('w3z315/filament-modal-notifications');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
            $this->loadTranslationsFrom($package->basePath('/../resources/lang'), 'filament-modal-notifications');
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        Filament::serving(function () {
            Livewire::component('filament-modal-notifications', Http\Livewire\ModalNotifications::class);
            FilamentView::registerRenderHook(
                PanelsRenderHook::PAGE_START,
                fn (): string => \Blade::render('@livewire(\'filament-modal-notifications\')')
            );
        });

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-modal-notifications/{$file->getFilename()}"),
                ], 'filament-modal-notifications-stubs');
            }
        }
    }

    protected function getAssetPackageName(): ?string
    {
        return 'w3z315/filament-modal-notifications';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-modal-notifications', __DIR__ . '/../resources/dist/components/filament-modal-notifications.js'),
            Css::make('filament-modal-notifications-styles', __DIR__ . '/../resources/dist/filament-modal-notifications.css'),
            Js::make('filament-modal-notifications-scripts', __DIR__ . '/../resources/dist/filament-modal-notifications.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_modal_notifications_table',
            'create_modal_notification_user_table',
        ];
    }
}
