<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

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
        $services=Service::all();
        View::share('service',$services);

        $car_type_all=Category::all();
        View::share('car_type',$car_type_all);

        $brand_all=Brand::all();
        View::share('brand',$brand_all);

        Paginator::useBootstrap();

    }
}
