<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

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
        // تعيين اللغة الحالية
        $locale = Session::get('locale', 'en'); // تحديد اللغة الافتراضية 'en'
        App::setLocale($locale);

        // تعيين اتجاه النص بناءً على اللغة
        $textDirection = ($locale === 'ar') ? 'rtl' : 'ltr';

        // مشاركة اتجاه النص مع جميع القوالب
        View::share('textDirection', $textDirection);
    }
}
