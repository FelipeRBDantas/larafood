<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{Category, Client, Plan, Tenant, Product, Table};
use App\Observers\{CategoryObserver, ClientObserver, PlanObserver, TenantObserver, ProductObserver, TableObserver};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Client::observe(ClientObserver::class);
        Table::observe(TableObserver::class);
    }
}
