<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\SupplierInterface;
use App\Repository\SupplierRepository;
use App\Service\DocumentBrazilService;
use App\Service\SupplierService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SupplierInterface::class, SupplierRepository::class);
        $this->app->bind(SupplierService::class, function ($app) {
            return new SupplierService($app->make(SupplierRepository::class));
        });
        $this->app->bind(DocumentBrazilService::class, function ($app) {
            return new DocumentBrazilService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
