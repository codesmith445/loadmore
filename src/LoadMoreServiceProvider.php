<?php

namespace Codesmith445\LoadMore;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class LoadMoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'loadmore');
        $this->publishes([
            __DIR__ . '/../public/loadmore.js' => public_path('vendor/loadmore/loadmore.js'),
        ], 'public');
        Blade::component('loadmore', \Codesmith445\LoadMore\View\Components\LoadMore::class);
    }

    public function register()
    {
        //
    }
}