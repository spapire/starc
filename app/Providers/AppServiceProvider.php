<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;



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
        Model::creating(function ($model) {
            if (empty($model->getKey()) && $model->getKeyType() === 'string') {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });

        Blade::if('seller', function () {
            return auth()->check() && auth()->user()->role === 'seller';
        });
    }
}
