<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use JoeDixon\Translation\Drivers\Translation;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public $translation;

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
    public function boot(Translation $translation)
    {
        Schema::defaultStringLength(191);
        $this->translation = $translation;
        View::share('languages', $this->translation->allLanguages());
    }
}
