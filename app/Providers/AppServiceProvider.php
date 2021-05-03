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
        if(!is_null(\request()->get('currency')))
        {  
            currency()->setUserCurrency(\request()->get('currency'));
            session()->put('currency',currency()->getUserCurrency());
        }
        Schema::defaultStringLength(191);
        $this->translation = $translation;
        View::share('languages', $this->translation->allLanguages());
    }
}
