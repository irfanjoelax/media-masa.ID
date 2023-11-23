<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerViteTheme('resources/css/filament.css');

            Filament::registerNavigationItems([
                NavigationItem::make('Visit Website')
                    ->url('/', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->activeIcon('heroicon-s-globe-alt'),
            ]);
        });

        Paginator::useBootstrapFour();
    }
}
