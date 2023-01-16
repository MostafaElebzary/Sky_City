<?php

namespace App\Providers;

use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        $languages = ['ar', 'en'];
        App::setLocale('ar');
        $lang = request()->header('lang');
        if ($lang) {
            if (in_array($lang, $languages)) {
                App::setLocale($lang);
            } else {
                App::setLocale('ar');
            }
        }
//        date_default_timezone_set('Asia/Riyadh');
//        View::share('settings', setting::first());
        View::share('unread_inbox', ContactUs::where('is_read', 0)->get());

    }
}
